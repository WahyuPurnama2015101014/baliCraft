<x-admin-layout>
    <div class="w-full ">
        <p class="text-xl flex items-center">
            <i class="fas fa-list mr-3"></i> {{$title}}
        </p>
        <a href="{{route('peng.create')}}">
            <button class="w-40 bg-green-600 text-white font-semibold py-2 my-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 hover:text-black flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> Tambah Data
            </button>
        </a>
        <div class="bg-white overflow-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <!-- <th class="w-1/12 text-left py-3 px-4 uppercase font-semibold text-sm">ID</th> -->
                        <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Nama</th>
                        <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Alamat</th>
                        <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                        <th class="w-1/6 text-center py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 ">
                    @foreach($pengrajin as $b)
                    <tr>
                        <!-- <td class=" text-left py-3 px-4">{{$b->id_peng}}</td> -->
                        <td class=" text-left py-3 px-4">{{$b->nama_peng}}</td>
                        <td class=" text-left py-3 px-4">{{$b->alamat}}</td>
                        <td class=" text-left py-3 px-4">{{$b->email}}</td>
                        <td class=" px-4 py-3 text-center">
                            <form action="{{route('peng.destroy',$b->id_peng)}}" method="POST">
                                @csrf @method('DELETE')
                                <div class="flex">
                                    <a href="{{route('peng.edit',$b->id_peng)}}" class="w-1/2 bg-blue-600 text-white font-semibold p-1 m-1 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-100 hover:text-black flex items-center justify-center">Edit</a>
                                    <button class="w-1/2 bg-red-600 text-white font-semibold p-1 m-1 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-100 hover:text-black flex items-center justify-center" onclick="return confirm('Anda Yakin ?')" type="submit">Del</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="m-4"> {{$pengrajin->links()}} </div>
    </div>
</x-admin-layout>