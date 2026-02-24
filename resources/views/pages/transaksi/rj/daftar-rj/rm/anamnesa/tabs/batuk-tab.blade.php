<div class="w-full mb-1">
    <div class="pt-2">
        <x-input-label for="dataDaftarPoliRJ.anamnesa.batuk.screeningBatuk" :value="__('Screening Batuk')" :required="__(false)"
            class="pt-2 sm:text-xl" />

        <div class="pt-2">
            <div class="grid grid-cols-2 gap-2 mt-2">
                <x-check-box value='1' :label="__('Riwayat Demam?')"
                    wire:model.live="dataDaftarPoliRJ.anamnesa.batuk.riwayatDemam" />

                <x-text-input id="dataDaftarPoliRJ.anamnesa.batuk.keteranganRiwayatDemam"
                    placeholder="Keterangan Riwayat Demam" class="mt-1 ml-2" :errorshas="__($errors->has('dataDaftarPoliRJ.anamnesa.batuk.keteranganRiwayatDemam'))" :disabled="$isFormLocked"
                    wire:model.live="dataDaftarPoliRJ.anamnesa.batuk.keteranganRiwayatDemam" />
            </div>

            <div class="grid grid-cols-2 gap-2 mt-2">
                <x-check-box value='1' :label="__('Riwayat Berkeringat Malam Hari Tanpa Aktifitas?')"
                    wire:model.live="dataDaftarPoliRJ.anamnesa.batuk.berkeringatMlmHari" />

                <x-text-input id="dataDaftarPoliRJ.anamnesa.batuk.keteranganBerkeringatMlmHari"
                    placeholder="Keterangan Berkeringat Malam Hari Tanpa Aktifitas" class="mt-1 ml-2" :errorshas="__($errors->has('dataDaftarPoliRJ.anamnesa.batuk.keteranganBerkeringatMlmHari'))"
                    :disabled="$isFormLocked" wire:model.live="dataDaftarPoliRJ.anamnesa.batuk.keteranganBerkeringatMlmHari" />
            </div>

            <div class="grid grid-cols-2 gap-2 mt-2">
                <x-check-box value='1' :label="__('Riwayat Bepergian Daerah Wabah?')"
                    wire:model.live="dataDaftarPoliRJ.anamnesa.batuk.bepergianDaerahWabah" />

                <x-text-input id="dataDaftarPoliRJ.anamnesa.batuk.keteranganBepergianDaerahWabah"
                    placeholder="Keterangan Bepergian Daerah Wabah" class="mt-1 ml-2" :errorshas="__($errors->has('dataDaftarPoliRJ.anamnesa.batuk.keteranganBepergianDaerahWabah'))"
                    :disabled="$isFormLocked"
                    wire:model.live="dataDaftarPoliRJ.anamnesa.batuk.keteranganBepergianDaerahWabah" />
            </div>

            <div class="grid grid-cols-2 gap-2 mt-2">
                <x-check-box value='1' :label="__('Riwayat Pemakaian Obat dalam Jangka Panjang?')"
                    wire:model.live="dataDaftarPoliRJ.anamnesa.batuk.riwayatPakaiObatJangkaPanjangan" />

                <x-text-input id="dataDaftarPoliRJ.anamnesa.batuk.keteranganRiwayatPakaiObatJangkaPanjangan"
                    placeholder="Keterangan Riwayat Pemakaian Obat" class="mt-1 ml-2" :errorshas="__(
                        $errors->has('dataDaftarPoliRJ.anamnesa.batuk.keteranganRiwayatPakaiObatJangkaPanjangan'),
                    )"
                    :disabled="$isFormLocked"
                    wire:model.live="dataDaftarPoliRJ.anamnesa.batuk.keteranganRiwayatPakaiObatJangkaPanjangan" />
            </div>

            <div class="grid grid-cols-2 gap-2 mt-2">
                <x-check-box value='1' :label="__('Riwayat Berat Badan Turun Tanpa Sebab?')"
                    wire:model.live="dataDaftarPoliRJ.anamnesa.batuk.BBTurunTanpaSebab" />

                <x-text-input id="dataDaftarPoliRJ.anamnesa.batuk.keteranganBBTurunTanpaSebab"
                    placeholder="Keterangan Berat Badan Turun Tanpa Sebab" class="mt-1 ml-2" :errorshas="__($errors->has('dataDaftarPoliRJ.anamnesa.batuk.keteranganBBTurunTanpaSebab'))"
                    :disabled="$isFormLocked" wire:model.live="dataDaftarPoliRJ.anamnesa.batuk.keteranganBBTurunTanpaSebab" />
            </div>

            <div class="grid grid-cols-2 gap-2 mt-2">
                <x-check-box value='1' :label="__('Ada Pembesaran Kelenjar Getah Bening?')"
                    wire:model.live="dataDaftarPoliRJ.anamnesa.batuk.pembesaranGetahBening" />

                <x-text-input id="dataDaftarPoliRJ.anamnesa.batuk.keteranganpembesaranGetahBening"
                    placeholder="Keterangan Pembesaran Kelenjar Getah Bening" class="mt-1 ml-2" :errorshas="__($errors->has('dataDaftarPoliRJ.anamnesa.batuk.keteranganpembesaranGetahBening'))"
                    :disabled="$isFormLocked"
                    wire:model.live="dataDaftarPoliRJ.anamnesa.batuk.keteranganpembesaranGetahBening" />
            </div>
        </div>
    </div>
</div>
