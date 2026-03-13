<div>
    {{-- Field Perawat Penerima --}}
    <div class="mb-2">
        <x-input-label for="dataDaftarPoliRJ.anamnesa.pengkajianPerawatan.perawatPenerima" :value="__('Perawat Penerima')"
            :required="__(true)" class="pt-2" />

        <div class="grid grid-cols-1 gap-2 ml-2">
            <x-text-input id="dataDaftarPoliRJ.anamnesa.pengkajianPerawatan.perawatPenerima"
                name="dataDaftarPoliRJ.anamnesa.pengkajianPerawatan.perawatPenerima" placeholder="Perawat Penerima"
                class="mt-1" :errorshas="__($errors->has('dataDaftarPoliRJ.anamnesa.pengkajianPerawatan.perawatPenerima'))" :disabled="true"
                wire:model.live="dataDaftarPoliRJ.anamnesa.pengkajianPerawatan.perawatPenerima" />

            <x-outline-button type="button" class="justify-center w-full" wire:click.prevent="setPerawatPenerima()"
                wire:loading.attr="disabled" wire:target="setPerawatPenerima">
                <span wire:loading.remove wire:target="setPerawatPenerima" class="inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                    Ttd Perawat
                </span>
                <span wire:loading wire:target="setPerawatPenerima" class="inline-flex items-center gap-2">
                    <x-loading />
                    Menyimpan...
                </span>
            </x-outline-button>
        </div>

        <x-input-error :messages="$errors->get('dataDaftarPoliRJ.anamnesa.pengkajianPerawatan.perawatPenerima')" class="mt-1 ml-2" />

        {{-- Waktu Datang otomatis saat TTD --}}
        <p class="mt-2 ml-2 text-xs text-gray-500 dark:text-gray-400">
            Waktu Datang:
            <span class="font-medium text-gray-700 dark:text-gray-200">
                {{ $dataDaftarPoliRJ['anamnesa']['pengkajianPerawatan']['jamDatang'] ?? '-' }}
            </span>
        </p>
    </div>

    {{-- Field Keluhan Utama --}}
    <div class="w-full mb-1">
        <x-input-label for="dataDaftarPoliRJ.anamnesa.keluhanUtama.keluhanUtama" :value="__('Keluhan Utama')" :required="__(true)"
            class="pt-2" />

        <div class="mb-2">
            <x-textarea id="dataDaftarPoliRJ.anamnesa.keluhanUtama.keluhanUtama" placeholder="Keluhan Utama"
                :errorshas="$errors->has('dataDaftarPoliRJ.anamnesa.keluhanUtama.keluhanUtama')" :disabled="$isFormLocked" :rows="3"
                wire:model.live="dataDaftarPoliRJ.anamnesa.keluhanUtama.keluhanUtama" />
        </div>

        <x-input-error :messages="$errors->get('dataDaftarPoliRJ.anamnesa.keluhanUtama.keluhanUtama')" class="mt-1" />
    </div>
</div>
