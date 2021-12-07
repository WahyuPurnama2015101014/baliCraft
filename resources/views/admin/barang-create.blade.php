<x-admin-layout>
    <div class="w-full ">
        <div>
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> {{$title}}
            </p>
        </div>
        <form enctype='multipart/form-data' action="{{(isset($barang))?route('brg.update',$barang->id_brg):route('brg.store')}}" method="POST">
            @CSRF
            @if(isset($barang))@method(' PUT')@endif
            <div class="flex flex-wrap">
                <div class="w-full my-3 pr-0 lg:pr-2">
                    <div class="leading-loose">
                        <form class="p-10 bg-white rounded shadow-xl">
                            <div class="flex ">
                                <div class=" w-1/2 mt-2 mr-2">
                                    <label class=" text-sm text-gray-600" for="name">Nama Kerajinan</label>
                                    <input class="w-full px-5 py-1 text-gray-700 bg-white rounded" id="nama_kerajinan" name="nama_kerajinan" type="text" required value=" {{(isset($barang))?$barang->nama_kerajinan:old('nama_kerajinan')}}" placeholder="Nama Kerajinan">
                                    @error('nama_kerajinan')
                                    <div class=" text-xs text-red-800">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex">
                                <div class=" w-1/4 mt-2 mr-2">
                                    <label class=" text-sm text-gray-600" for="email">Bahan</label>
                                    <!-- <input class="w-full px-5 py-1 text-gray-700 bg-white rounded" id="bahan" name="bahan" type="text" required value="{{(isset($barang))?$barang->bahan:old('bahan')}}" placeholder="Bahan Kerajinan"> -->
                                    <select class="w-full px-5 py-1 text-gray-700 bg-white rounded" id="bahan" name="bahan">
                                        <option value="">Pilih Bahan</option>
                                        <option value="Aluminium" {{ (isset($barang)&&$barang->bahan=="Aluminium")?'selected':''}}>Aluminium</option>
                                        <option value="Perak" {{ (isset($barang)&&$barang->bahan=="Perak")?'selected':''}}>Perak</option>
                                    </select>
                                    @error('bahan')
                                    <div class=" text-xs text-red-800">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class=" w-1/4 mt-2">
                                    <label class=" text-sm text-gray-600" for="email">Harga</label>
                                    <input class="w-full px-5 py-1 text-gray-700 bg-white rounded" id="harga" name="harga" type="text" required value="{{(isset($barang))?$barang->harga:old('harga')}}" placeholder="Harga Kerajinan">
                                    @error('harga')
                                    <div class=" text-xs text-red-800">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex">
                                <div class=" w-1/4 mt-2 mr-2">
                                    <!-- nama penrajin -->
                                    <label class=" text-sm text-gray-600" for="email">Nama Pengrajin</label>
                                    <select class="w-full px-5 py-1 text-gray-700 bg-white rounded" id="id_peng" name="id_peng">
                                        <option value="">Pilih Pengrajin</option>
                                        @foreach($pengrajin as $p)
                                        <option value="{{$p->id_peng}}" {{(( isset($barang)&&$barang->id_peng==$p->id_peng) || old('id_peng')==$p->id_peng)?'selected':''}}>
                                            {{$p->nama_peng}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('id_peng')
                                    <div class=" text-xs text-red-800">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class=" w-1/4 mt-2">
                                    <!--gambar-->
                                    <label class=" text-sm text-gray-600" for="email">Gambar Kerajinan</label>
                                    <input class="w-full px-5 py-1 text-gray-700 bg-white rounded" id="gambar" name="gambar" type="file" value="{{(isset($barang))?$barang->gambar:old('gambar')}}">
                                    @error('gambar')
                                    <div class=" text-xs text-red-800">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-2">
                                <label class=" block text-sm text-gray-600" for="message">Keterangan</label>
                                <textarea class="w-1/2 px-5 py-2 text-gray-700 bg-white rounded" id="keterangan" name="keterangan" rows="3" value="{{(isset($barang))?$barang->keterangan:old('keterangan')}}" placeholder="keterangan"></textarea>
                            </div>
                            <div class="mt-6 flex">
                                <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded shadow-lg hover:shadow-lg" type="submit">Submit</button>
                                <a href="/brg" class="w-20 ml-3 bg-red-600 font-semibold text-white rounded shadow-lg hover:shadow-lg flex items-center justify-center">
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-admin-layout>