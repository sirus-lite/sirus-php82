<div class="w-full mb-1">
    <div>
        <x-input-label for="dataDaftarPoliRJ.anamnesa.riwayatPenyakitDahulu.riwayatPenyakitDahulu" :value="__('Riwayat Penyakit Dahulu')"
            :required="__(true)" class="pt-2 sm:text-xl" />

        <div class="mb-2">
            <x-textarea id="dataDaftarPoliRJ.anamnesa.riwayatPenyakitDahulu.riwayatPenyakitDahulu"
                placeholder="Riwayat Perjalanan Penyakit" class="mt-1 ml-2" :errorshas="__($errors->has('dataDaftarPoliRJ.anamnesa.riwayatPenyakitDahulu.riwayatPenyakitDahulu'))" :disabled="$isFormLocked"
                :rows="3"
                wire:model.live="dataDaftarPoliRJ.anamnesa.riwayatPenyakitDahulu.riwayatPenyakitDahulu" />
        </div>
        @error('dataDaftarPoliRJ.anamnesa.riwayatPenyakitDahulu.riwayatPenyakitDahulu')
            <x-input-error :messages="$message" />
        @enderror
    </div>



    <div>
        <x-input-label for="dataDaftarPoliRJ.anamnesa.alergi.alergi" :value="__('Alergi')" :required="__(false)"
            class="pt-2 sm:text-xl" />

        <div class="mb-2">
            <x-textarea id="dataDaftarPoliRJ.anamnesa.alergi.alergi"
                placeholder="Jenis Alergi / Alergi [Makanan / Obat / Udara]" class="mt-1 ml-2" :errorshas="__($errors->has('dataDaftarPoliRJ.anamnesa.alergi.alergi'))"
                :disabled="$isFormLocked" :rows="3" wire:model.live="dataDaftarPoliRJ.anamnesa.alergi.alergi" />
        </div>
        @error('dataDaftarPoliRJ.anamnesa.alergi.alergi')
            <x-input-error :messages="$message" />
        @enderror
    </div>
</div>
