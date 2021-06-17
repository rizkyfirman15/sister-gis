<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Guru;
use App\Mapel;
use App\Kelas;
use App\Jadwal;
use App\Absen;
use App\Kehadiran;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Exports\GuruExport;
use App\Imports\GuruImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapel = Mapel::orderBy('nama_mapel')->get();
        $max = Guru::max('id_card');
        $kelas      = Kelas::all();

        return view('admin.guru.index', compact('mapel', 'max', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_card'                  => 'required',
            'nama_guru'                => 'required',
            'mapel_id'                 => 'required',
            'kelas_id'                 => 'required',
            'kode'                     => 'required|string|unique:guru|min:2|max:3',
            'jk'                       => 'required',
            'nama_ibu_kandung'         => 'required',
            'alamat'                   => 'required',
            'rt'                       => 'required',
            'rw'                       => 'required',
            'kelurahan'                => 'required',
            'kecamatan'                => 'required',
            'kode_pos'                 => 'required',
            'nik'                      => 'required',
            'no_kk'                    => 'required',
            'no_npwp'                  => 'required',
            'nama_wajib_pajak'         => 'required',
            'agama'                    => 'required',
            'kewarganegaraan'          => 'required',
            'status_perkawinan'        => 'required',
            'nama_suami_istri'         => 'required',
            'nik_suami_istri'          => 'required',
            'pekerjaan'                => 'required',
            'jenis_ptk'                => 'required',
            'pendidikan_terakhir'      => 'required',
            'satuan_pendidikan_formal' => 'required',
            'fakultas'                 => 'required',
            'thn_masuk'                => 'required',
            'thn_lulus'                => 'required',
            'ktp'                      => 'mimes:jpg,jpeg,png',
            'kk'                       => 'mimes:jpg,jpeg,png',
            'npwp'                     => 'mimes:jpg,jpeg,png',
            'ijazah'                   => 'mimes:jpg,jpeg,png',
            'akte'                     => 'mimes:jpg,jpeg,png',
            'kependidikan'             => 'required',
        ]);

        if ($request->foto) {
            $foto = $request->foto;
            $new_foto = date('s' . 'i' . 'H' . 'd' . 'm' . 'Y') . "_" . $foto->getClientOriginalName();
            $ktp = $this->moveToPublic($request->file('ktp'));
            $kk = $this->moveToPublic($request->file('kk'));
            $npwp = $this->moveToPublic($request->file('npwp'));
            $ijazah = $this->moveToPublic($request->file('ijazah'));
            $akte = $this->moveToPublic($request->file('akte'));

            Guru::create([
                'id_card'               => $request->id_card,
                'nama_guru'             => $request->nama_guru,
                'mapel_id'              => $request->mapel_id,
                'kelas_id'              => $request->kelas_id,
                'kode'                  => $request->kode,
                'jk'                    => $request->jk,
                'telp'                  => $request->telp,
                'tmp_lahir'             => $request->tmp_lahir,
                'tgl_lahir'             => $request->tgl_lahir,
                'nama_ibu_kandung'      => $request->nama_ibu_kandung,
                'alamat'                => $request->alamat,
                'rt'                    => $request->rt,
                'rw'                    => $request->rw,
                'kelurahan'             => $request->kelurahan,
                'kecamatan'             => $request->kecamatan,
                'kode_pos'              => $request->kode_pos,
                'nik'                   => $request->nik,
                'no_kk'                 => $request->no_kk,
                'no_npwp'               => $request->no_npwp,
                'nama_wajib_pajak'      => $request->nama_wajib_pajak,
                'agama'                 => $request->agama,
                'kewarganegaraan'       => $request->kewarganegaraan,
                'status_perkawinan'     => $request->status_perkawinan,
                'nama_suami_istri'      => $request->nama_suami_istri,
                'nik_suami_istri'       => $request->nik_suami_istri,
                'pekerjaan'             => $request->pekerjaan,
                'jenis_ptk'             => $request->jenis_ptk,
                'pendidikan_terakhir'   => $request->pendidikan_terakhir,
                'satuan_pendidikan_formal'=> $request->satuan_pendidikan_formal,
                'fakultas'                => $request->fakultas,
                'thn_masuk'               => $request->thn_masuk,
                'thn_lulus'               => $request->thn_lulus,
                'kependidikan'            => $request->kependidikan,
                'ktp'                     => $ktp,
                'kk'                      => $kk,
                'npwp'                    => $npwp,
                'ijazah'                  => $ijazah,
                'akte'                    => $akte,
                'foto'                    => 'uploads/guru/' . $new_foto,
            ]);
            $foto->move('uploads/guru/', $new_foto);
        } else {
            if ($request->jk == 'L') {
                $foto = 'uploads/guru/35251431012020_male.jpg';
            } else {
                $foto = 'uploads/guru/23171022042020_female.jpg';
            }

            $ktp = $this->moveToPublic($request->file('ktp'));
            $kk = $this->moveToPublic($request->file('kk'));
            $npwp = $this->moveToPublic($request->file('npwp'));
            $ijazah = $this->moveToPublic($request->file('ijazah'));
            $akte = $this->moveToPublic($request->file('akte'));

            Guru::create([
                'id_card'               => $request->id_card,
                'nama_guru'             => $request->nama_guru,
                'mapel_id'              => $request->mapel_id,
                'kelas_id'              => $request->kelas_id,
                'kode'                  => $request->kode,
                'jk'                    => $request->jk,
                'telp'                  => $request->telp,
                'tmp_lahir'             => $request->tmp_lahir,
                'tgl_lahir'             => $request->tgl_lahir,
                'nama_ibu_kandung'      => $request->nama_ibu_kandung,
                'alamat'                => $request->alamat,
                'rt'                    => $request->rt,
                'rw'                    => $request->rw,
                'kelurahan'             => $request->kelurahan,
                'kecamatan'             => $request->kecamatan,
                'kode_pos'              => $request->kode_pos,
                'number_phone'          => $request->number_phone,
                'no_kk'                 => $request->no_kk,
                'no_npwp'               => $request->no_npwp,
                'nama_wajib_pajak'      => $request->nama_wajib_pajak,
                'agama'                 => $request->agama,
                'kewarganegaraan'       => $request->kewarganegaraan,
                'status_perkawinan'     => $request->status_perkawinan,
                'nama_suami_istri'      => $request->nama_suami_istri,
                'nik_suami_istri'       => $request->nik_suami_istri,
                'pekerjaan'             => $request->pekerjaan,
                'jenis_ptk'             => $request->jenis_ptk,
                'pendidikan_terakhir'   => $request->pendidikan_terakhir,
                'satuan_pendidikan_formal'=> $request->satuan_pendidikan_formal,
                'fakultas'                => $request->fakultas,
                'thn_masuk'               => $request->thn_masuk,
                'thn_lulus'               => $request->thn_lulus,
                'kependidikan'            => $request->kependidikan,
                'ktp'                     => $ktp,
                'kk'                      => $kk,
                'npwp'                    => $npwp,
                'ijazah'                  => $ijazah,
                'akte'                    => $akte,
                'foto'                    => $foto
            ]);
        }

        return redirect()->back()->with('success', 'Berhasil menambahkan data guru baru!');
    }

    /**
     * move file to public guru
     */
    public function moveToPublic($file)
    {
        $fileName = date('s' . 'i' . 'H' . 'd' . 'm' . 'Y') . "_" . $file->getClientOriginalName();
        $destination = public_path('uploads/guru');
        $file->move($destination,$fileName);

        return $fileName;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $guru = Guru::findorfail($id);
        return view('admin.guru.details', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $guru = Guru::findorfail($id);
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        return view('admin.guru.edit', compact('guru', 'mapel', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_guru'                => 'required',
            'mapel_id'                 => 'required',
            'kelas_id'                 => 'required',
            // 'kode'                     => 'required|string|unique:guru|min:2|max:3',
            'jk'                       => 'required',
            'nama_ibu_kandung'         => 'required',
            'alamat'                   => 'required',
            'rt'                       => 'required',
            'rw'                       => 'required',
            'kelurahan'                => 'required',
            'kecamatan'                => 'required',
            'kode_pos'                 => 'required',
            'nik'                      => 'required',
            'no_kk'                    => 'required',
            'no_npwp'                  => 'required',
            'nama_wajib_pajak'         => 'required',
            'agama'                    => 'required',
            'kewarganegaraan'          => 'required',
            'status_perkawinan'        => 'required',
            'nama_suami_istri'         => 'required',
            'nik_suami_istri'          => 'required',
            'pekerjaan'                => 'required',
            'jenis_ptk'                => 'required',
            'pendidikan_terakhir'      => 'required',
            'satuan_pendidikan_formal' => 'required',
            'fakultas'                 => 'required',
            'thn_masuk'                => 'required',
            'thn_lulus'                => 'required',
            'kependidikan'             => 'required',
            'ktp'                      => 'mimes:jpg,jpeg,png',
            'kk'                       => 'mimes:jpg,jpeg,png',
            'npwp'                     => 'mimes:jpg,jpeg,png',
            'ijazah'                   => 'mimes:jpg,jpeg,png',
            'akte'                     => 'mimes:jpg,jpeg,png',
        ]);

        $guru = Guru::findorfail($id);
        $user = User::where('id_card', $guru->id_card)->first();
        if ($user) {
            $user_data = [
                'name' => $request->nama_guru
            ];
            $user->update($user_data);
        } else {
        }

        $newKtp    = $guru->ktp;
        $oldKtp    = $guru->ktp;

        $newKk     = $guru->kk;
        $oldKk     = $guru->kk;

        $newNpwp   = $guru->npwp;
        $oldNpwp   = $guru->npwp;

        $newIjazah = $guru->ijazah;
        $oldIjazah = $guru->ijazah;

        $newAkte   = $guru->akte;
        $oldAkte   = $guru->akte;

        if ($request->hasFile('ktp')) {
            $newKtp = $this->moveToPublic($request->ktp);
            $guru->ktp = $newKtp;
            \File::delete(public_path('uploads/guru'.$oldKtp));
        }

        if ($request->hasFile('kk')) {
            $newKk = $this->moveToPublic($request->kk);
            $guru->kk = $newKk;
            \File::delete(public_path('uploads/guru'.$oldKk));
        }

        if ($request->hasFile('npwp')) {
            $newNpwp = $this->moveToPublic($request->npwp);
            $guru->npwp = $newNpwp;
            \File::delete(public_path('uploads/guru'.$oldNpwp));
        }

        if ($request->hasFile('ijazah')) {
            $newIjazah = $this->moveToPublic($request->ijazah);
            $guru->ijazah = $newIjazah;
            \File::delete(public_path('uploads/guru'.$oldIjazah));
        }

        if ($request->hasFile('akte')) {
            $newAkte = $this->moveToPublic($request->akte);
            $guru->akte = $newAkte;
            \File::delete(public_path('uploads/guru'.$oldAkte));
        }

        $guru_data = [
            'nama_guru'             => $request->nama_guru,
            'mapel_id'              => $request->mapel_id,
            'kelas_id'              => $request->kelas_id,
            'jk'                    => $request->jk,
            'telp'                  => $request->telp,
            'tmp_lahir'             => $request->tmp_lahir,
            'tgl_lahir'             => $request->tgl_lahir,
            'nama_ibu_kandung'      => $request->nama_ibu_kandung,
            'alamat'                => $request->alamat,
            'rt'                    => $request->rt,
            'rw'                    => $request->rw,
            'kelurahan'             => $request->kelurahan,
            'kecamatan'             => $request->kecamatan,
            'kode_pos'              => $request->kode_pos,
            'number_phone'          => $request->number_phone,
            'no_kk'                 => $request->no_kk,
            'no_npwp'               => $request->no_npwp,
            'nama_wajib_pajak'      => $request->nama_wajib_pajak,
            'agama'                 => $request->agama,
            'kewarganegaraan'       => $request->kewarganegaraan,
            'status_perkawinan'     => $request->status_perkawinan,
            'nama_suami_istri'      => $request->nama_suami_istri,
            'nik_suami_istri'       => $request->nik_suami_istri,
            'pekerjaan'             => $request->pekerjaan,
            'jenis_ptk'             => $request->jenis_ptk,
            'pendidikan_terakhir'   => $request->pendidikan_terakhir,
            'satuan_pendidikan_formal'=> $request->satuan_pendidikan_formal,
            'fakultas'                => $request->fakultas,
            'thn_masuk'               => $request->thn_masuk,
            'thn_lulus'               => $request->thn_lulus,
            'kependidikan'            => $request->kependidikan,
            'ktp'                     => $newKtp,
            'kk'                      => $newKk,
            'npwp'                    => $newNpwp,
            'ijazah'                  => $newIjazah,
            'akte'                    => $newAkte,
        ];

        $guru->update($guru_data);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = Guru::findorfail($id);
        $countJadwal = Jadwal::where('guru_id', $guru->id)->count();
        if ($countJadwal >= 1) {
            $jadwal = Jadwal::where('guru_id', $guru->id)->delete();
        } else {
        }
        $countUser = User::where('id_card', $guru->id_card)->count();
        if ($countUser >= 1) {
            $user = User::where('id_card', $guru->id_card)->delete();
        } else {
        }
        $guru->delete();
        return redirect()->route('guru.index')->with('warning', 'Data guru berhasil dihapus! (Silahkan cek trash data guru)');
    }

    public function trash()
    {
        $guru = Guru::onlyTrashed()->get();
        return view('admin.guru.trash', compact('guru'));
    }

    public function restore($id)
    {
        $id = Crypt::decrypt($id);
        $guru = Guru::withTrashed()->findorfail($id);
        $countJadwal = Jadwal::withTrashed()->where('guru_id', $guru->id)->count();
        if ($countJadwal >= 1) {
            $jadwal = Jadwal::withTrashed()->where('guru_id', $guru->id)->restore();
        } else {
        }
        $countUser = User::withTrashed()->where('id_card', $guru->id_card)->count();
        if ($countUser >= 1) {
            $user = User::withTrashed()->where('id_card', $guru->id_card)->restore();
        } else {
        }
        $guru->restore();
        return redirect()->back()->with('info', 'Data guru berhasil direstore! (Silahkan cek data guru)');
    }

    public function kill($id)
    {
        $guru = Guru::withTrashed()->findorfail($id);
        $countJadwal = Jadwal::withTrashed()->where('guru_id', $guru->id)->count();
        if ($countJadwal >= 1) {
            $jadwal = Jadwal::withTrashed()->where('guru_id', $guru->id)->forceDelete();
        } else {
        }
        $countUser = User::withTrashed()->where('id_card', $guru->id_card)->count();
        if ($countUser >= 1) {
            $user = User::withTrashed()->where('id_card', $guru->id_card)->forceDelete();
        } else {
        }
        $guru->forceDelete();
        return redirect()->back()->with('success', 'Data guru berhasil dihapus secara permanent');
    }

    public function ubah_foto($id)
    {
        $id = Crypt::decrypt($id);
        $guru = Guru::findorfail($id);
        return view('admin.guru.ubah-foto', compact('guru'));
    }

    public function update_foto(Request $request, $id)
    {
        $this->validate($request, [
            'foto' => 'required'
        ]);

        $guru = Guru::findorfail($id);
        $foto = $request->foto;
        $new_foto = date('s' . 'i' . 'H' . 'd' . 'm' . 'Y') . "_" . $foto->getClientOriginalName();
        $guru_data = [
            'foto' => 'uploads/guru/' . $new_foto,
        ];
        $foto->move('uploads/guru/', $new_foto);
        $guru->update($guru_data);

        return redirect()->route('guru.index')->with('success', 'Berhasil merubah foto!');
    }

    public function mapel($id)
    {
        $id = Crypt::decrypt($id);
        $mapel = Mapel::findorfail($id);
        $guru = Guru::where('mapel_id', $id)->orderBy('kode', 'asc')->get();
        return view('admin.guru.show', compact('mapel', 'guru'));
    }

    public function absen()
    {
        $absen = Absen::where('tanggal', date('Y-m-d'))->get();
        $kehadiran = Kehadiran::limit(4)->get();
        return view('guru.absen', compact('absen', 'kehadiran'));
    }

    public function simpan(Request $request)
    {
        $this->validate($request, [
            'id_card' => 'required',
            'kehadiran_id' => 'required'
        ]);
        $cekGuru = Guru::where('id_card', $request->id_card)->count();
        if ($cekGuru >= 1) {
            $guru = Guru::where('id_card', $request->id_card)->first();
            if ($guru->id_card == Auth::user()->id_card) {
                $cekAbsen = Absen::where('guru_id', $guru->id)->where('tanggal', date('Y-m-d'))->count();
                if ($cekAbsen == 0) {
                    if (date('w') != '0' && date('w') != '6') {
                        if (date('H:i:s') >= '06:00:00') {
                            if (date('H:i:s') >= '09:00:00') {
                                if (date('H:i:s') >= '16:15:00') {
                                    Absen::create([
                                        'tanggal' => date('Y-m-d'),
                                        'guru_id' => $guru->id,
                                        'kehadiran_id' => '6',
                                    ]);
                                    return redirect()->back()->with('info', 'Maaf sekarang sudah waktunya pulang!');
                                } else {
                                    if ($request->kehadiran_id == '1') {
                                        $terlambat = date('H') - 9 . ' Jam ' . date('i') . ' Menit';
                                        if (date('H') - 9 == 0) {
                                            $terlambat = date('i') . ' Menit';
                                        }
                                        Absen::create([
                                            'tanggal' => date('Y-m-d'),
                                            'guru_id' => $guru->id,
                                            'kehadiran_id' => '5',
                                        ]);
                                        return redirect()->back()->with('warning', 'Maaf anda terlambat ' . $terlambat . '!');
                                    } else {
                                        Absen::create([
                                            'tanggal' => date('Y-m-d'),
                                            'guru_id' => $guru->id,
                                            'kehadiran_id' => $request->kehadiran_id,
                                        ]);
                                        return redirect()->back()->with('success', 'Anda hari ini berhasil absen!');
                                    }
                                }
                            } else {
                                Absen::create([
                                    'tanggal' => date('Y-m-d'),
                                    'guru_id' => $guru->id,
                                    'kehadiran_id' => $request->kehadiran_id,
                                ]);
                                return redirect()->back()->with('success', 'Anda hari ini berhasil absen tepat waktu!');
                            }
                        } else {
                            return redirect()->back()->with('info', 'Maaf absensi di mulai jam 6 pagi!');
                        }
                    } else {
                        $namaHari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
                        $d = date('w');
                        $hari = $namaHari[$d];
                        return redirect()->back()->with('info', 'Maaf sekolah hari ' . $hari . ' libur!');
                    }
                } else {
                    return redirect()->back()->with('warning', 'Maaf absensi tidak bisa dilakukan 2x!');
                }
            } else {
                return redirect()->back()->with('error', 'Maaf id card ini bukan milik anda!');
            }
        } else {
            return redirect()->back()->with('error', 'Maaf id card ini tidak terdaftar!');
        }
    }

    public function absensi()
    {
        $guru = Guru::all();
        return view('admin.guru.absen', compact('guru'));
    }

    public function kehadiran($id)
    {
        $id = Crypt::decrypt($id);
        $guru = Guru::findorfail($id);
        $absen = Absen::orderBy('tanggal', 'desc')->where('guru_id', $id)->get();
        return view('admin.guru.kehadiran', compact('guru', 'absen'));
    }

    public function export_excel()
    {
        return Excel::download(new GuruExport, 'guru.xlsx');
    }

    public function import_excel(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        $file = $request->file('file');
        $nama_file = rand() . $file->getClientOriginalName();
        $file->move('file_guru', $nama_file);
        Excel::import(new GuruImport, public_path('/file_guru/' . $nama_file));
        return redirect()->back()->with('success', 'Data Guru Berhasil Diimport!');
    }

    public function deleteAll()
    {
        $guru = Guru::all();
        if ($guru->count() >= 1) {
            Guru::whereNotNull('id')->delete();
            Guru::withTrashed()->whereNotNull('id')->forceDelete();
            return redirect()->back()->with('success', 'Data table guru berhasil dihapus!');
        } else {
            return redirect()->back()->with('warning', 'Data table guru kosong!');
        }
    }
}
