<div class="w-full mb-1">
    <div class="pt-2">
        <x-input-label for="dataDaftarPoliRJ.anamnesa.statusPsikologis.statusPsikologis" :value="__('Status Psikologis')"
            :required="__(false)" class="pt-2 sm:text-xl" />

        <div class="grid grid-cols-4 gap-2 pt-2">
            <x-check-box value='1' :label="__('Tidak Ada Kelainan')"
                wire:model.live="dataDaftarPoliRJ.anamnesa.statusPsikologis.tidakAdaKelainan" />

            <x-check-box value='1' :label="__('Marah')"
                wire:model.live="dataDaftarPoliRJ.anamnesa.statusPsikologis.marah" />

            <x-check-box value='1' :label="__('Cemas')"
                wire:model.live="dataDaftarPoliRJ.anamnesa.statusPsikologis.ccemas" />

            <x-check-box value='1' :label="__('Takut')"
                wire:model.live="dataDaftarPoliRJ.anamnesa.statusPsikologis.takut" />

            <x-check-box value='1' :label="__('Sedih')"
                wire:model.live="dataDaftarPoliRJ.anamnesa.statusPsikologis.sedih" />

            <x-check-box value='1' :label="__('Resiko Bunuh Diri')"
                wire:model.live="dataDaftarPoliRJ.anamnesa.statusPsikologis.cenderungBunuhDiri" />
        </div>

        <div class="mb-2">
            <x-text-input id="dataDaftarPoliRJ.anamnesa.statusPsikologis.statusPsikologis" placeholder="Lainnya"
                class="mt-1 ml-2" :errorshas="__($errors->has('dataDaftarPoliRJ.anamnesa.statusPsikologis.sebutstatusPsikologis'))" :disabled="$isFormLocked"
                wire:model.live="dataDaftarPoliRJ.anamnesa.statusPsikologis.sebutstatusPsikologis" />
        </div>
    </div>

    <div class="pt-2">
        <x-input-label for="dataDaftarPoliRJ.anamnesa.statusMental.statusMental" :value="__('Status Mental')" :required="__(false)"
            class="pt-2 sm:text-xl" />

        <div class="pt-2">
            <div class="flex mt-2 ml-2">
                @foreach ($dataDaftarPoliRJ['anamnesa']['statusMental']['statusMentalOption'] as $statusMentalOption)
                    <x-radio-button :label="__($statusMentalOption['statusMental'])" value="{{ $statusMentalOption['statusMental'] }}"
                        wire:model="dataDaftarPoliRJ.anamnesa.statusMental.statusMental" />
                @endforeach
            </div>
        </div>

        <div class="mb-2">
            <x-text-input id="dataDaftarPoliRJ.anamnesa.statusMental.statusMental" placeholder="Lainnya"
                class="mt-1 ml-2" :errorshas="__($errors->has('dataDaftarPoliRJ.anamnesa.statusMental.statusMental'))" :disabled="$isFormLocked"
                wire:model.live="dataDaftarPoliRJ.anamnesa.statusMental.sebutstatusPsikologis" />
        </div>
    </div>
</div>
