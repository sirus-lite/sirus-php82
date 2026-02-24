<?php

use Livewire\Component;
use App\Http\Traits\Txn\Rj\EmrRJTrait;
use App\Http\Traits\WithRenderVersioning\WithRenderVersioningTrait;

new class extends Component {
    use EmrRJTrait, WithRenderVersioningTrait;

    public bool $isFormLocked = false;
    public ?int $rjNo = null;
    public array $dataDaftarPoliRJ = [];

    // renderVersions
    public array $renderVersions = [];
    protected array $renderAreas = ['modal-anamnesa-rj'];

    /* ===============================
     | OPEN REKAM MEDIS PERAWAT - ANAMNESA
     =============================== */
    public function openAnamnesa(int $rjNo = null): void
    {
        if (empty($rjNo)) {
            return;
        }

        $this->resetForm();
        $this->resetValidation();

        // Ambil data kunjungan RJ
        $dataDaftarPoliRJ = $this->findDataRJ($rjNo);

        if (!$dataDaftarPoliRJ) {
            $this->dispatch('toast', type: 'error', message: 'Data Rawat Jalan tidak ditemukan.');
            return;
        }

        $this->dataDaftarPoliRJ = $dataDaftarPoliRJ;

        // Initialize anamnesa data if not exists
        if (!isset($this->dataDaftarPoliRJ['anamnesa'])) {
            $this->dataDaftarPoliRJ['anamnesa'] = $this->getDefaultAnamnesa();
        }
        // Cek status lock
        if ($this->checkEmrRJStatus($rjNo)) {
            $this->isFormLocked = true;
        }
    }

    /* ===============================
     | GET DEFAULT ANAMNESA STRUCTURE
     =============================== */
    private function getDefaultAnamnesa(): array
    {
        return [
            'pengkajianPerawatanTab' => 'Pengkajian Perawatan',
            'pengkajianPerawatan' => [
                'perawatPenerima' => '',
                'jamDatang' => '',
            ],

            'keluhanUtamaTab' => 'Keluhan Utama',
            'keluhanUtama' => [
                'keluhanUtama' => '',
            ],

            'anamnesaDiperolehTab' => 'Anamnesa Diperoleh',
            'anamnesaDiperoleh' => [
                'autoanamnesa' => [],
                'allonanamnesa' => [],
                'anamnesaDiperolehDari' => '',
            ],

            'riwayatPenyakitSekarangUmumTab' => 'Riwayat Penyakit Sekarang (Umum)',
            'riwayatPenyakitSekarangUmum' => [
                'riwayatPenyakitSekarangUmum' => '',
            ],

            'riwayatPenyakitDahuluTab' => 'Riwayat Penyakit (Dahulu)',
            'riwayatPenyakitDahulu' => [
                'riwayatPenyakitDahulu' => '',
            ],

            'alergiTab' => 'Alergi',
            'alergi' => [
                'alergi' => '',
            ],

            'rekonsiliasiObatTab' => 'Rekonsiliasi Obat',
            'rekonsiliasiObat' => [],

            'lainLainTab' => 'lain-Lain',
            'lainLain' => [
                'merokok' => [],
                'terpaparRokok' => [],
            ],

            'faktorResikoTab' => 'Faktor Resiko',
            'faktorResiko' => [
                'hipertensi' => [],
                'diabetesMelitus' => [],
                'penyakitJantung' => [],
                'asma' => [],
                'stroke' => [],
                'liver' => [],
                'tuberculosisParu' => [],
                'rokok' => [],
                'minumAlkohol' => [],
                'ginjal' => [],
                'lainLain' => '',
            ],

            'penyakitKeluargaTab' => 'Riwayat Penyakit Keluarga',
            'penyakitKeluarga' => [
                'hipertensi' => [],
                'diabetesMelitus' => [],
                'penyakitJantung' => [],
                'asma' => [],
                'lainLain' => '',
            ],

            'statusFungsionalTab' => 'Status Fungsional',
            'statusFungsional' => [
                'tongkat' => [],
                'kursiRoda' => [],
                'brankard' => [],
                'walker' => [],
                'lainLain' => '',
            ],

            'cacatTubuhTab' => 'Cacat Tubuh',
            'cacatTubuh' => [
                'cacatTubuh' => [],
                'sebutCacatTubuh' => '',
            ],

            'statusPsikologisTab' => 'Status Psikologis',
            'statusPsikologis' => [
                'tidakAdaKelainan' => [],
                'marah' => [],
                'ccemas' => [],
                'takut' => [],
                'sedih' => [],
                'cenderungBunuhDiri' => [],
                'sebutstatusPsikologis' => '',
            ],

            'statusMentalTab' => 'Status Mental',
            'statusMental' => [
                'statusMental' => '',
                'statusMentalOption' => [['statusMental' => 'Sadar dan Orientasi Baik'], ['statusMental' => 'Ada Masalah Perilaku'], ['statusMental' => 'Perilaku Kekerasan yang dialami sebelumnya']],
                'keteranganStatusMental' => '',
            ],

            'hubunganDgnKeluargaTab' => 'Sosial',
            'hubunganDgnKeluarga' => [
                'hubunganDgnKeluarga' => '',
                'hubunganDgnKeluargaOption' => [['hubunganDgnKeluarga' => 'Baik'], ['hubunganDgnKeluarga' => 'Tidak Baik']],
            ],

            'tempatTinggalTab' => 'Tempat Tinggal',
            'tempatTinggal' => [
                'tempatTinggal' => '',
                'tempatTinggalOption' => [['tempatTinggal' => 'Rumah'], ['tempatTinggal' => 'Panti'], ['tempatTinggal' => 'Lain-lain']],
                'keteranganTempatTinggal' => '',
            ],

            'spiritualTab' => 'Spiritual',
            'spiritual' => [
                'spiritual' => 'Islam',
                'ibadahTeratur' => '',
                'ibadahTeraturOptions' => [['ibadahTeratur' => 'Ya'], ['ibadahTeratur' => 'Tidak']],
                'nilaiKepercayaan' => '',
                'nilaiKepercayaanOptions' => [['nilaiKepercayaan' => 'Ya'], ['nilaiKepercayaan' => 'Tidak']],
                'keteranganSpiritual' => '',
            ],

            'ekonomiTab' => 'Ekonomi',
            'ekonomi' => [
                'pengambilKeputusan' => 'Ayah',
                'pekerjaan' => 'Swasta',
                'penghasilanBln' => '',
                'penghasilanBlnOptions' => [['penghasilanBln' => '< 5Jt'], ['penghasilanBln' => '5Jt - 10Jt'], ['penghasilanBln' => '>10Jt']],
                'keteranganEkonomi' => '',
            ],

            'edukasiTab' => 'Edukasi',
            'edukasi' => [
                'pasienKeluargaMenerimaInformasi' => '',
                'pasienKeluargaMenerimaInformasiOptions' => [['pasienKeluargaMenerimaInformasi' => 'Ya'], ['pasienKeluargaMenerimaInformasi' => 'Tidak']],
                'hambatanEdukasi' => '',
                'keteranganHambatanEdukasi' => '',
                'hambatanEdukasiOptions' => [['hambatanEdukasi' => 'Ya'], ['hambatanEdukasi' => 'Tidak']],
                'penerjemah' => '',
                'keteranganPenerjemah' => '',
                'penerjemahOptions' => [['penerjemah' => 'Ya'], ['penerjemah' => 'Tidak']],
                'diagPenyakit' => [],
                'obat' => [],
                'dietNutrisi' => [],
                'rehabMedik' => [],
                'managemenNyeri' => [],
                'penggunaanAlatMedis' => [],
                'hakKewajibanPasien' => [],
                'edukasiFollowUp' => '',
                'segeraKembaliRjjika' => '',
                'informedConsent' => '',
                'keteranganEdukasi' => '',
            ],

            'screeningGiziTab' => 'Screening Gizi',
            'screeningGizi' => [
                'perubahanBB3Bln' => '',
                'perubahanBB3BlnScore' => '0',
                'perubahanBB3BlnOptions' => [['perubahanBB3Bln' => 'Ya (1)'], ['perubahanBB3Bln' => 'Tidak (0)']],
                'jmlPerubahabBB' => '',
                'jmlPerubahabBBScore' => '0',
                'jmlPerubahabBBOptions' => [['jmlPerubahabBB' => '0,5Kg-1Kg (1)'], ['jmlPerubahabBB' => '>5Kg-10Kg (2)'], ['jmlPerubahabBB' => '>10Kg-15Kg (3)'], ['jmlPerubahabBB' => '>15Kg-20Kg (4)']],
                'intakeMakanan' => '',
                'intakeMakananScore' => '0',
                'intakeMakananOptions' => [['intakeMakanan' => 'Ya (1)'], ['intakeMakanan' => 'Tidak (0)']],
                'keteranganScreeningGizi' => '',
                'scoreTotalScreeningGizi' => '0',
                'tglScreeningGizi' => '',
            ],

            'batukTab' => 'Batuk',
            'batuk' => [
                'riwayatDemam' => [],
                'keteranganRiwayatDemam' => '',
                'berkeringatMlmHari' => [],
                'keteranganBerkeringatMlmHari' => '',
                'bepergianDaerahWabah' => [],
                'keteranganBepergianDaerahWabah' => '',
                'riwayatPakaiObatJangkaPanjangan' => [],
                'keteranganRiwayatPakaiObatJangkaPanjangan' => '',
                'BBTurunTanpaSebab' => [],
                'keteranganBBTurunTanpaSebab' => '',
                'pembesaranGetahBening' => [],
                'keteranganPembesaranGetahBening' => '',
            ],
        ];
    }

    /* ===============================
     | CLOSE MODAL
     =============================== */
    public function closeModal(): void
    {
        $this->resetValidation();
        $this->resetForm();
        $this->dispatch('close-modal', name: 'rm-anamnesa-actions');
    }

    /* ===============================
     | SAVE ANAMNESA
     =============================== */
    public function save(): void
    {
        if ($this->isFormLocked) {
            $this->dispatch('toast', type: 'error', message: 'Form dalam mode read-only, tidak dapat menyimpan data.');
            return;
        }

        // Validate jamDatang if exists
        if (isset($this->dataDaftarPoliRJ['anamnesa']['pengkajianPerawatan']['jamDatang']) && !empty($this->dataDaftarPoliRJ['anamnesa']['pengkajianPerawatan']['jamDatang'])) {
            $this->validate([
                'dataDaftarPoliRJ.anamnesa.pengkajianPerawatan.jamDatang' => 'date_format:d/m/Y H:i:s',
            ]);
        }

        try {
            \DB::transaction(function () {
                // Update RJ with anamnesa data
                $this->updateJsonRJ($this->rjNo, $this->dataDaftarPoliRJ);

                // Update pasien alergi data if needed
                if (isset($this->dataDaftarPoliRJ['anamnesa']['alergi']['alergi']) && isset($this->dataDaftarPoliRJ['regNo'])) {
                    $this->updatePasienAlergi();
                }
            });

            $this->afterSave('Anamnesa berhasil disimpan.');
        } catch (\Exception $e) {
            $this->dispatch('toast', type: 'error', message: 'Gagal menyimpan: ' . $e->getMessage());
        }
    }

    private function updatePasienAlergi(): void
    {
        $pasienData = \DB::table('rsmst_pasiens')->where('reg_no', $this->dataDaftarPoliRJ['regNo'])->first();

        if ($pasienData) {
            $metaData = json_decode($pasienData->meta_data_pasien_json ?? '{}', true);
            $metaData['pasien']['alergi'] = $this->dataDaftarPoliRJ['anamnesa']['alergi']['alergi'];

            \DB::table('rsmst_pasiens')
                ->where('reg_no', $this->dataDaftarPoliRJ['regNo'])
                ->update([
                    'meta_data_pasien_json' => json_encode($metaData),
                    'meta_data_pasien_xml' => \Spatie\ArrayToXml\ArrayToXml::convert($metaData),
                ]);
        }
    }

    /* ===============================
     | SET PERAWAT PENERIMA
     =============================== */
    public function setPerawatPenerima(): void
    {
        if ($this->isFormLocked) {
            return;
        }

        if (auth()->user()->hasRole('Perawat')) {
            $this->dataDaftarPoliRJ['anamnesa']['pengkajianPerawatan']['perawatPenerima'] = auth()->user()->myuser_name;
            $this->dataDaftarPoliRJ['anamnesa']['pengkajianPerawatan']['perawatPenerimaCode'] = auth()->user()->myuser_code;
            $this->save();
        } else {
            $this->dispatch('toast', type: 'error', message: 'Hanya user dengan role Perawat yang dapat melakukan TTD-E.');
        }
    }

    /* ===============================
     | SET JAM DATANG
     =============================== */
    public function setJamDatang($time): void
    {
        if (!$this->isFormLocked) {
            $this->dataDaftarPoliRJ['anamnesa']['pengkajianPerawatan']['jamDatang'] = $time;
        }
    }

    private function afterSave(string $message): void
    {
        $this->dispatch('toast', type: 'success', message: $message);
        $this->dispatch('syncronizeAssessmentPerawatRJFindData');
        $this->dispatch('refresh-datatable');
        $this->closeModal();
    }

    protected function resetForm(): void
    {
        $this->reset(['rjNo', 'dataDaftarPoliRJ']);
        $this->resetVersion();
        $this->isFormLocked = false;
    }

    public function mount()
    {
        $this->registerAreas(['modal-anamnesa-rj']);
        $this->openAnamnesa($this->rjNo);
    }
};

?>
<div>
    {{-- CONTAINER UTAMA - SATU-SATUNYA WIRE:KEY --}}
    <div class="flex flex-col w-full" wire:key="{{ $this->renderKey('modal-anamnesa-rj', [$rjNo ?? 'new']) }}">
        {{-- BODY --}}
        <div class="w-full mx-auto">
            <div
                class="w-full p-4 space-y-6 bg-white border border-gray-200 shadow-sm rounded-2xl dark:bg-gray-900 dark:border-gray-700">

                {{-- jika anamnesa ada --}}
                @if (isset($dataDaftarPoliRJ['anamnesa']))
                    <div class="w-full">
                        <div id="TransaksiRawatJalan" x-data="{ activeTab: '{{ $dataDaftarPoliRJ['anamnesa']['pengkajianPerawatanTab'] }}' }" class="w-full">

                            {{-- TAB NAVIGATION --}}
                            <div class="w-full px-2 mb-2 border-b border-gray-200 dark:border-gray-700">
                                <ul
                                    class="flex flex-wrap w-full -mb-px text-xs font-medium text-center text-gray-500 dark:text-gray-400">
                                    <li class="mr-2">
                                        <label
                                            class="inline-block px-4 py-2 border-b-2 border-transparent rounded-t-lg cursor-pointer hover:text-gray-600 hover:border-gray-300"
                                            :class="activeTab === '{{ $dataDaftarPoliRJ['anamnesa']['pengkajianPerawatanTab'] }}'
                                                ?
                                                'text-primary border-primary bg-gray-100' : ''"
                                            @click="activeTab ='{{ $dataDaftarPoliRJ['anamnesa']['pengkajianPerawatanTab'] }}'">
                                            {{ $dataDaftarPoliRJ['anamnesa']['pengkajianPerawatanTab'] }}
                                        </label>
                                    </li>

                                    <li class="mr-2">
                                        <label
                                            class="inline-block px-4 py-2 border-b-2 border-transparent rounded-t-lg cursor-pointer hover:text-gray-600 hover:border-gray-300"
                                            :class="activeTab === '{{ $dataDaftarPoliRJ['anamnesa']['statusPsikologisTab'] }}'
                                                ?
                                                'text-primary border-primary bg-gray-100' : ''"
                                            @click="activeTab ='{{ $dataDaftarPoliRJ['anamnesa']['statusPsikologisTab'] }}'">
                                            {{ $dataDaftarPoliRJ['anamnesa']['statusPsikologisTab'] }}
                                        </label>
                                    </li>

                                    <li class="mr-2">
                                        <label
                                            class="inline-block px-4 py-2 border-b-2 border-transparent rounded-t-lg cursor-pointer hover:text-gray-600 hover:border-gray-300"
                                            :class="activeTab === '{{ $dataDaftarPoliRJ['anamnesa']['batukTab'] }}' ?
                                                'text-primary border-primary bg-gray-100' : ''"
                                            @click="activeTab ='{{ $dataDaftarPoliRJ['anamnesa']['batukTab'] }}'">
                                            {{ $dataDaftarPoliRJ['anamnesa']['batukTab'] }}
                                        </label>
                                    </li>

                                    <li class="mr-2">
                                        <label
                                            class="inline-block px-4 py-2 border-b-2 border-transparent rounded-t-lg cursor-pointer hover:text-gray-600 hover:border-gray-300"
                                            :class="activeTab === '{{ $dataDaftarPoliRJ['anamnesa']['alergiTab'] }}' ?
                                                'text-primary border-primary bg-gray-100' : ''"
                                            @click="activeTab ='{{ $dataDaftarPoliRJ['anamnesa']['alergiTab'] }}'">
                                            {{ $dataDaftarPoliRJ['anamnesa']['alergiTab'] }}
                                        </label>
                                    </li>
                                </ul>
                            </div>

                            {{-- TAB CONTENTS --}}
                            <div class="w-full p-4">
                                {{-- PENGKAJIAN PERAWATAN TAB --}}
                                <div class="w-full"
                                    x-show.transition.in.opacity.duration.600="activeTab === '{{ $dataDaftarPoliRJ['anamnesa']['pengkajianPerawatanTab'] }}'">
                                    @include('pages.transaksi.rj.daftar-rj.rm.anamnesa.tabs.pengkajian-perawatan-tab')
                                </div>

                                {{-- STATUS PSIKOLOGIS TAB --}}
                                <div class="w-full"
                                    x-show.transition.in.opacity.duration.600="activeTab === '{{ $dataDaftarPoliRJ['anamnesa']['statusPsikologisTab'] }}'">
                                    @include('pages.transaksi.rj.daftar-rj.rm.anamnesa.tabs.status-psikologis-tab')
                                </div>

                                {{-- BATUK TAB --}}
                                <div class="w-full"
                                    x-show.transition.in.opacity.duration.600="activeTab === '{{ $dataDaftarPoliRJ['anamnesa']['batukTab'] }}'">
                                    @include('pages.transaksi.rj.daftar-rj.rm.anamnesa.tabs.batuk-tab')
                                </div>

                                {{-- ALERGI TAB --}}
                                <div class="w-full"
                                    x-show.transition.in.opacity.duration.600="activeTab === '{{ $dataDaftarPoliRJ['anamnesa']['alergiTab'] }}'">
                                    {{-- @include('pages.transaksi.rj.daftar-rj.rm.anamnesa.tabs.alergi-tab') --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
