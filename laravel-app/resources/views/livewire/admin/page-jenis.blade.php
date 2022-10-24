<div>
    <div class="px-4  mx-auto w-full">
        <div class="flex flex-wrap">
            <div class="w-full my-1 px-4">
                @include('sweetalert::alert')
                <div
                    class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white text-black">
                    <div class="rounded-t mb-0 px-4 py-3 border-0">
                        <div class="flex flex-wrap items-center">
                            <x-jet-validation-errors />
                            <form class="relative w-full px-4 max-w-full flex-grow flex-1">
                                <div class="mb-3">
                                    <x-jet-label for='gambar_jenis'>Gambar</x-jet-label>
                                    <x-jet-input type="file" wire:model='gambar_jenis' />
                                </div>
                                <div class="mb-3">
                                    <x-jet-label for='nama_jenis'>Nama Jenis</x-jet-label>
                                    <x-jet-input type="text" wire:model='nama_Jenis' />
                                </div>
                                @if ($editJenis == false)
                                    <x-jet-button type='button' wire:click='createJenis'>Tambah</x-jet-button>
                                @elseif($editJenis == true)
                                    <x-jet-button type='button' wire:click='editJenis({{ $itemID }})'>Simpan
                                    </x-jet-button>
                                @endif
                            </form>
                        </div>
                    </div>
                    <div class="block w-full overflow-x-auto">

                        <table class="items-center w-full bg-transparent border-collapse">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-red-800 text-white border-red-700">
                                        Jenis
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-red-800 text-white border-red-700">
                                        Katalog
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-red-800 text-white border-red-700">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jenis as $item)
                                    <tr class="border-b border-black">
                                      <x-td>{{$item->nama_jenis}}</x-td>
                                      <x-td>Katalog</x-td>
                                     <x-td>
                                        <x-jet-secondary-button wire:click='editJenisModal({{ $item->id }})'>
                                            Edit</x-jet-secondary-button> |
                                             <x-jet-danger-button
                                            wire:click='hapusJenis({{ $item->id }})'>Hapus</x-jet-danger-button>
                                     </x-td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
