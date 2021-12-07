<x-admin-layout>
    <div class="w-full ">
        <p class="text-xl flex items-center">
            <i class="fas fa-list mr-3"></i> {{$title}}
        </p>
        <div class=" w-full my-3 items-center">
            <a href="{{route('brg.create')}}">
                <button class="w-40 h-10 float-left bg-green-600 text-white font-semibold  rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 hover:text-black items-center ">
                    <i class="fas fa-plus mr-3"></i> Tambah Data
                </button>
            </a>
            <!-- PENCARIAN -->
            <!-- memberikan form pencarian menggunakan method get -->
            <!-- method get lebih baik digunakan pada pencarian -->
            <!-- salah satunya karena dapat merekam parameter query pada address bar-->
            <form action="/brg" method="GET">
                <div class="float-right grid grid-cols-1 md:grid-cols-2 ">
                    <div>
                        <!-- memberikan filter berupa kelompok tani-->
                        <select id="pengrajin" name="peng" class="block w-full py-2 px-4 border border-gray-300 bg-white rounded-l-2xl shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">Pilih Pengrajin</option>
                            <!-- menampilkan list kelompok petani-->
                            @foreach ($pengrajin as $item)
                            <option value="{{$item->nama_peng}}" {{(isset($_GET['peng'])&&$_GET['peng'] == $item->nama_peng)?'selected':''}}>
                                {{$item->nama_peng}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <!-- memberikan kata kunci dangan nama s -->
                        <input type="text" name="s" value="{{(isset($_GET['s']))?$_GET['s']:''}}" class="px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300">
                        <button type="submit" class="rounded-r-md border border-l-0 px-4 py-1 border-gray-300 bg-gray-50 text-gray-500 text-blue-600 hover:text-white hover:bg-blue-600">
                            Cari</button>
                    </div>
                </div>
            </form>
            <!-- END PENCARIAN -->
        </div>
        <div class="min-w-full bg-white overflow-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <!-- <th class="w-1/12 text-left py-3 px-4 uppercase font-semibold text-sm">ID</th> -->
                        <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Nama Barang</th>
                        <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Bahan</th>
                        <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Harga</th>
                        <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Nama Pengrajin</th>
                        <th class="w-1/6 text-center py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 ">
                    @foreach($barang as $key=>$b)
                    <tr>
                        <td class=" text-left py-3 px-4">{{$b->nama_kerajinan}}</td>
                        <td class=" text-left py-3 px-4">{{$b->bahan}}</td>
                        <td class=" text-left py-3 px-4">Rp.{{$b->harga}}</td>
                        <td class=" text-left py-3 px-4">{{$b->nama_peng}}</td>
                        <td class=" px-4 py-3 text-center">
                            <form action="{{route('brg.destroy',$b->id_brg)}}" method="POST">
                                @csrf @method('DELETE')
                                <div class="flex">
                                    <a href="{{route('brg.edit',$b->id_brg)}}" class="w-1/2 bg-blue-600 text-white font-semibold p-1 m-1 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-100 hover:text-black flex items-center justify-center">Edit</a>
                                    <button class="w-1/2 bg-red-600 text-white font-semibold p-1 m-1 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-100 hover:text-black flex items-center justify-center" onclick="return confirm('Anda Yakin ?')" type="submit">Del</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$barang->appends(request()->query())->links()}}
    </div>
</x-admin-layout>