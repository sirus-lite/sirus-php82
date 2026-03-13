<div>
    <div class="w-full mb-1">

        @include('pages.transaksi.rj.emr-rj.perencanaan.tabs.terapi-tab')

        {{-- Waktu Pemeriksaan otomatis saat Simpan Terapi --}}
        <p class="mt-1 ml-2 text-xs text-gray-500 dark:text-gray-400">
            Waktu Pemeriksaan:
            <span class="font-medium text-gray-700 dark:text-gray-200">
                {{ $dataDaftarPoliRJ['perencanaan']['pengkajianMedis']['waktuPemeriksaan'] ?? '-' }}
            </span>
        </p>

        <div class="mb-2 mt-4">
            <x-input-label for="drPemeriksa" :value="__('Dokter Pemeriksa')" :required="__(false)" />
            <div class="grid grid-cols-1 gap-2">
                <x-text-input id="drPemeriksa" placeholder="Dokter Pemeriksa" class="mt-1 ml-2" :error="$errors->has('dataDaftarPoliRJ.perencanaan.pengkajianMedis.drPemeriksa')"
                    :disabled=true wire:model="dataDaftarPoliRJ.perencanaan.pengkajianMedis.drPemeriksa" />

                @if (!$isFormLocked)
                    <x-outline-button type="button" class="justify-center w-full" wire:click.prevent="setDrPemeriksa"
                        wire:loading.attr="disabled" wire:target="setDrPemeriksa">
                        <span wire:loading.remove wire:target="setDrPemeriksa" class="inline-flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                            TTD Dokter
                        </span>
                        <span wire:loading wire:target="setDrPemeriksa" class="inline-flex items-center gap-2">
                            <x-loading />
                            Menyimpan...
                        </span>
                    </x-outline-button>
                @endif
            </div>
            <x-input-error :messages="$errors->get('dataDaftarPoliRJ.perencanaan.pengkajianMedis.drPemeriksa')" class="mt-1" />

            {{-- Selesai Pemeriksaan otomatis saat TTD Dokter --}}
            <p class="mt-2 ml-2 text-xs text-gray-500 dark:text-gray-400">
                Selesai Pemeriksaan:
                <span class="font-medium text-gray-700 dark:text-gray-200">
                    {{ $dataDaftarPoliRJ['perencanaan']['pengkajianMedis']['selesaiPemeriksaan'] ?? '-' }}
                </span>
            </p>
        </div>
    </div>
</div>
