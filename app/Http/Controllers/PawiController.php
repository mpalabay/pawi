<?php

namespace App\Http\Controllers;

use App\Models\Pawi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PawiController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $pawiss = [

            [
                'author' => 'Juan Dela Cruz',
                'message' => "Pagod na ako today. Parang buong araw akong tumatakbo pero pakiramdam ko wala akong masyadong nagawa. Minsan hirap lang talaga i-process lahat ng nangyayari, kaya eto, ilalabas ko na lang dito para gumaan kahit papaano.",
                'time' => '5 minutes ago',
                'edited' => true,
            ],
            [
                'author' => 'Maria Santos',
                'message' => "Minsan ang daming pumapasok sa isip ko at hindi ko na alam kung saan magsisimula. Gusto ko lang magkaroon ng katahimikan kahit saglit, yung hindi ko kailangang mag-isip ng kung ano man at makapagpahinga talaga.",
                'time' => '1 hour ago',
                'edited' => false,
            ],
            [
                'author' => 'Carlos Mendoza',
                'message' => "May progress naman kahit maliit. Hindi man siya ganun kalaki, pero at least umuusad ako. Siguro kailangan ko lang tanggapin na okay lang mabagal basta hindi titigil.",
                'time' => '3 hours ago',
                'edited' => true,
            ],


            [
                'author' => 'Ana Reyes',
                'message' => "Hindi madali ang lahat ng pinagdadaanan ko ngayon pero pinipilit kong kayanin. Unti-unti lang, kahit maliit na hakbang basta tuloy-tuloy, darating din ako sa gusto kong marating.",
                'time' => '5 minutes ago',
                'edited' => true,
            ],
            [
                'author' => 'Mark Bautista',
                'message' => "Grabe yung overthinking ko lately, parang lahat na lang pinoproblema ko kahit hindi naman dapat. Alam kong hindi siya healthy pero ang hirap pigilan minsan, kaya sinusubukan ko na lang ilabas para mabawasan.",
                'time' => '1 hour ago',
                'edited' => false,
            ],

            [
                'author' => 'Paulo Garcia',
                'message' => "Araw-araw may struggle.\nPero tuloy lang.",
                'time' => '5 minutes ago',
                'edited' => true,
            ],
            [
                'author' => 'Katrina Lopez',
                'message' => "Ngayon lang ulit nakahinga nang maayos.\nAng sarap sa pakiramdam.",
                'time' => '1 hour ago',
                'edited' => false,
            ],
            [
                'author' => 'Rafael Torres',
                'message' => "Maraming iniisip pero kakayanin.\nHindi ako susuko.",
                'time' => '3 hours ago',
                'edited' => true,
            ],
        ];

        $pawis = Pawi::with('user')->where('visibility', 'public')->whereNull('archived_at')->latest()->take(50)->get();


        return view('home', ['pawis' => $pawis]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        // Validate the request
        $validated = $request->validate([
            'is_anonymous' => 'required|boolean',
            'visibility' => 'required|in:public,private',
            'content' => 'required|string',
            'is_letgo' => 'required|boolean',
        ]);
        
        auth()->user()->pawis()->create($validated);

        // Pawi::create([
        //     'is_anonymous' => $validated['is_anonymous'],
        //     'visibility' => $validated['visibility'],
        //     'content' => $validated['content'],
        //     'is_letgo' => $validated['is_letgo'],
        // ]);


        if ($validated['is_letgo']) {
            return redirect('/home')->with(['success' => "You've let this go.\nThis post will gently disappear after 5 minutes.", 'icon' => 'letgo']);
        }
        
        return redirect('/home')->with(['success'=>'Your thoughts have been shared.', 'icon'=>'share']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pawi $pawi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pawi $pawi)
    {
        
        return response()->json($pawi->load('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pawi $pawi)
    {
        //
         $this->authorize('update', $pawi);

        $validated = $request->validate([
            'is_anonymous' => 'required|boolean',
            'visibility' => 'required|in:public,private',
            'content' => 'required|string',
            'is_letgo' => 'required|boolean',
        ]);

        $pawi->update($validated);

        return redirect()->back()->with('success', 'Your thoughts have been updated.');
    }

    public function archive(Request $request, Pawi $pawi)
    {
        //
        $this->authorize('update', $pawi);
        $pawi->timestamps = false;

        $pawi->update(['archived_at' => now(),]);

        $pawi->timestamps = true;

        return redirect()->back()->with(['success' => 'Thought archived.', 'icon' => 'archive']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pawi $pawi)
    {
        $this->authorize('delete', $pawi);
        $pawi->timestamps = false;
        $pawi->delete();
        $pawi->timestamps = false;
        return redirect()->back()->with(['success' => 'Thought moved to Trash.', 'icon' => 'trash']);
    }
    
}
