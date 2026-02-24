<div class="w-full mb-1">
    <div>
        <x-input-label for="dataDaftarPoliRJ.anamnesa.pengkajianPerawatan.jamDatang" :value="__('Waktu Datang')"
            :required="__(true)" />

        <div class="mb-2">
            {{ $dataDaftarPoliRJ['anamnesa']['pengkajianPerawatan']['jamDatang'] ?? '-' }}
            <div class="grid grid-cols-4 mb-2">
                <x-text-input id="dataDaftarPoliRJ.anamnesa.pengkajianPerawatan.jamDatang"
                    placeholder="Waktu Datang [dd/mm/yyyy hh24:mi:ss]" class="col-span-3 mt-1 ml-2" :errorshas="__($errors->has('dataDaftarPoliRJ.anamnesa.pengkajianPerawatan.jamDatang'))"
                    :disabled="$isFormLocked" wire:model.live="dataDaftarPoliRJ.anamnesa.pengkajianPerawatan.jamDatang" />

                @if (!$dataDaftarPoliRJ['anamnesa']['pengkajianPerawatan']['jamDatang'])
                    <div class="w-1/2 ml-2">
                        <div wire:loading wire:target="setJamDatang">
                            <x-loading />
                        </div>
                        <x-primary-button :disabled="false"
                            wire:click.prevent="setJamDatang('{{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }}')"
                            type="button" wire:loading.remove>
                            Set Jam Datang
                        </x-primary-button>
                    </div>
                @endif
            </div>
        </div>
        @error('dataDaftarPoliRJ.anamnesa.pengkajianPerawatan.jamDatang')
            <x-input-error :messages="$message" />
        @enderror
    </div>

    <div class="mb-2 ">
        <x-input-label for="dataDaftarPoliRJ.anamnesa.pengkajianPerawatan.perawatPenerima" :value="__('Perawat Penerima')"
            :required="__(true)" class="pt-2 sm:text-xl" />
        <div class="grid grid-cols-4 ml-2">
            <x-text-input id="dataDaftarPoliRJ.anamnesa.pengkajianPerawatan.perawatPenerima"
                name="dataDaftarPoliRJ.anamnesa.pengkajianPerawatan.perawatPenerima" placeholder="Perawat Penerima"
                class="col-span-3 mt-1 ml-2" :errorshas="__($errors->has('dataDaftarPoliRJ.anamnesa.pengkajianPerawatan.perawatPenerima'))" :disabled="true"
                wire:model.live="dataDaftarPoliRJ.anamnesa.pengkajianPerawatan.perawatPenerima"
                autocomplete="dataDaftarPoliRJ.anamnesa.pengkajianPerawatan.perawatPenerima" />

            <x-secondary-button :disabled=false wire:click.prevent="setPerawatPenerima()" type="button"
                wire:loading.remove>
                ttd Perawat
            </x-secondary-button>
        </div>
        @error('dataDaftarPoliRJ.anamnesa.pengkajianPerawatan.perawatPenerima')
            <x-input-error :messages="$message" />
        @enderror
    </div>
    @include('pages.transaksi.rj.daftar-rj.rm.anamnesa.tabs.keluhan-utama-tab')
    @include('pages.transaksi.rj.daftar-rj.rm.anamnesa.tabs.riwayat-penyakit-sekarang-tab')
    @include('pages.transaksi.rj.daftar-rj.rm.anamnesa.tabs.riwayat-penyakit-dahulu-tab')


</div>
