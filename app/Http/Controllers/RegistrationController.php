<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Rules\OpsiStatus;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;

class RegistrationController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(): View
    {
        $registrations = Registration::where('waktu_booking', '>=', Carbon::today())->orderBy('waktu_booking', 'asc')->paginate(10);

        return view('registrations.index', compact('registrations'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('registrations.create');
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        $registration = Registration::findOrFail($id);
        return view('registrations.edit', compact('registration'));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => 'required|min:3',
            'no_hp' => 'required|phone:ID',
            'waktu_booking' => 'required|date|after:today',
        ], [
            'nama.required' => 'masukkan nama',
            'nama.min' => 'nama harus lebih dari atau sama dengan 3 karakter',
            'no_hp.required' => 'masukkan no hp',
            'no_hp.phone' => 'no hp tidak valid',
            'waktu_booking.required' => 'pilih tanggal',
            'waktu_booking.date' => 'tanggal tidak valid',
            'waktu_booking.after' => 'pilih tanggal setelah hari ini'
        ]);

        Registration::create([
            'nama' => $request->nama,
            'no_hp' => RegistrationController::checkPhone($request->no_hp),
            'status' => 'menunggu konfirmasi',
            'waktu_booking' => $request->waktu_booking,
        ]);

        return redirect()->route('registrations.index')->with(['success' => 'berhasil menambahkan pesanan']);
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $registration = Registration::findOrFail($id);
        $registration->delete();

        return redirect()->route('registrations.index')->with(['success' => 'pesanan berhasil dihapus']);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nama' => 'required|min:3',
            'no_hp' => 'required|phone:ID',
            'waktu_booking' => 'required|date|after:today',
            'status' => ['required', new OpsiStatus()]
        ], [
            'nama.required' => 'masukkan nama',
            'nama.min' => 'nama harus lebih dari atau sama dengan 3 karakter',
            'no_hp.required' => 'masukkan no hp',
            'no_hp.phone' => 'no hp tidak valid',
            'waktu_booking.required' => 'pilih tanggal',
            'waktu_booking.date' => 'tanggal tidak valid',
            'waktu_booking.after' => 'pilih tanggal setelah hari ini',
            'status.required' => 'pilih status'
        ]);
        $registration = Registration::findOrFail($id);
        $registration->update([
            'nama' => $request->nama,
            'no_hp' => RegistrationController::checkPhone($request->no_hp),
            'status' => $request->status,
            'waktu_booking' => $request->waktu_booking,
        ]);
        return redirect()->route('registrations.index')->with(['success' => 'pesanan berhasil diubah']);
    }

    private function checkPhone(string $phone): string
    {
        if (strpos($phone, '0') === 0) {
            return preg_replace('/^0/', '62', $phone);
        }
        if (strpos($phone, '62') === 0) {
            return $phone;
        }
        return '62' . $phone;
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function indexPost(Request $request):RedirectResponse{
        $request->validate([
            'nama' => 'required|min:3',
            'no_hp' => 'required|phone:ID',
            'waktu_booking' => 'required|date|after:today',
        ], [
            'nama.required' => 'masukkan nama',
            'nama.min' => 'nama harus lebih dari atau sama dengan 3 karakter',
            'no_hp.required' => 'masukkan no hp',
            'no_hp.phone' => 'no hp tidak valid',
            'waktu_booking.required' => 'pilih tanggal',
            'waktu_booking.date' => 'tanggal tidak valid',
            'waktu_booking.after' => 'pilih tanggal setelah hari ini'
        ]);

        Registration::create([
            'nama' => $request->nama,
            'no_hp' => RegistrationController::checkPhone($request->no_hp),
            'status' => 'menunggu konfirmasi',
            'waktu_booking' => $request->waktu_booking,
        ]);

        return redirect()->route('index')->with(['success' => 'kami akan menghubungimu melalui whatsapp dari nomor yang disubmit']);
    }
}