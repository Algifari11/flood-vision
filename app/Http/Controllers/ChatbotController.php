<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function ask(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string',
            'context' => 'nullable|string'
        ]);

        $userPrompt = $validated['message'];
        $context = $validated['context'] ?? "Kondisi saat ini terukur aman dan stabil di bantaran sungai.";

        // Mengambil key Groq yang baru saja kamu masukkan ke .env
        $apiKey = env('GROQ_API_KEY');

        $systemInstruction = "Anda adalah Mori Nalove Assistant - Sistem Mitigasi Banjir Cerdas. Jawablah pertanyaan pengguna secara ilmiah, ramah, profesional, dan fokus pada teknologi computer vision, level air sungai, serta mitigasi bencana. Gunakan bahasa Indonesia yang baik, jelas, dan solutif. Gunakan konteks real-time ini sebagai acuan: " . $context;

        if (empty($apiKey)) {
            return response()->json([
                'success' => true,
                'reply' => "Sistem lokal: GROQ_API_KEY belum terkonfigurasi dengan benar di file .env Anda."
            ]);
        }

        try {
            // Menembak Endpoint Resmi Groq Cloud Chat Completions
            $response = Http::withoutVerifying()
                ->withToken($apiKey)
                ->post("https://api.groq.com/openai/v1/chat/completions", [
                    'model' => 'llama-3.3-70b-versatile', // Memanggil Llama 3.3 70B yang cerdas & gratis
                    'messages' => [
                        ['role' => 'system', 'content' => $systemInstruction],
                        ['role' => 'user', 'content' => $userPrompt]
                    ],
                    'temperature' => 0.7
                ]);

            if ($response->successful()) {
                $data = $response->json();
                $replyText = $data['choices'][0]['message']['content'] ?? null;
                
                if ($replyText) {
                    return response()->json([
                        'success' => true,
                        'reply' => $replyText
                    ]);
                }
            }

            return response()->json([
                'success' => true,
                'reply' => "Groq API Error (" . $response->status() . "): " . $response->body()
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => true,
                'reply' => "Gagal memproses AI via Groq. Error: " . $e->getMessage()
            ]);
        }
    }
}