<x-admin-layout>
    <div class="w-full ">
        <div>
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> {{$title}}
            </p>
        </div>
        <form action="{{(isset($pengrajin))?route('peng.update',$pengrajin->id_peng):route('peng.store')}}" method="POST">
            @CSRF
            @if(isset($pengrajin))@method(' PUT')@endif
            <div class="flex flex-wrap">
                <div class="w-full my-3 pr-0 lg:pr-2">
                    <div class="leading-loose">
                        <form class="p-10 bg-white rounded shadow-xl">
                            <div class="flex w-1/2">
                                <div class=" w-full mt-2 mr-2">
                                    <label class=" text-sm text-gray-600" for="name">Nama</label>
                                    <input class="w-full px-5 py-1 text-gray-700 bg-white rounded" id="nama_peng" name="nama_peng" type="text" required value="{{(isset($pengrajin))?$pengrajin->nama_peng:old('nama_peng')}}">
                                    @error('nama_peng')
                                    <div class=" text-xs text-red-800">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex w-1/2">
                                <div class=" w-full mt-2 mr-2">
                                    <label class=" text-sm text-gray-600" for="email">Email</label>
                                    <input class="w-full px-5 py-1 text-gray-700 bg-white rounded" id="email" name="email" type="text" required value="{{(isset($pengrajin))?$pengrajin->email:old('email')}}">
                                    @error('email')
                                    <div class=" text-xs text-red-800">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-2 w-1/2">
                                <label class=" block text-sm text-gray-600" for="message">Alamat</label>
                                <input class="w-full px-5 py-2 text-gray-700 bg-white rounded" id="alamat" name="alamat" type="text" value="{{(isset($pengrajin))?$pengrajin->alamat:old('alamat')}}"></input>
                            </div>
                            <div class="mt-6 flex">
                                <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
                                <a href="/peng" class="w-20 ml-3 bg-red-600 font-semibold text-white rounded shadow-lg hover:shadow-lg flex items-center justify-center">
                                    Kembali
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-admin-layout>