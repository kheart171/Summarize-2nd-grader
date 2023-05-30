<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SummarizerController extends Controller
{
    public function summarize(Request $request)
    {
        $text = $request->input('text');

        // Send request to OpenAI for summarization
        $client = new Client();

        try {
            $response = $client->post('https://api.openai.com/v1/completions', [
                'headers' => [
                    'Authorization' => 'Bearer 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',
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'model' => "text-davinci-003",
                    'prompt' => "Summarize this for a second-grade student:\n\n" . $text,
                    'temperature' => 0.7,
                    'max_tokens' => 256, // Adjust the number of tokens based on your needs
                    'top_p' => 1,
                    'frequency_penalty' => 0,
                    'presence_penalty' => 0,
                ],
            ]);

            $summary = json_decode($response->getBody(), true)['choices'][0]['text'];

            // Simplify the summary text for a second-grader
            $simplifiedSummary = $this->simplifySummary($summary);

            return view('dashboard', ['summary' => $simplifiedSummary]);
        } catch (\Exception $e) {
            // Handle API request error
            return view('dashboard', ['summary' => 'An error occurred during summarization.']);
        }
    }

    private function simplifySummary($summary)
    {
        // Simplify the summary text for a second-grader
        // You can use various techniques like word replacement, sentence simplification, etc.
        // Here's a simple example of replacing complex words with simpler alternatives

        $wordMapping = [
            'utilize' => 'use',
            'enhanced' => 'improved',
            'strive' => 'aim',
            // Add more word mappings as needed
        ];

        $simplifiedSummary = str_replace(array_keys($wordMapping), array_values($wordMapping), $summary);

        return $simplifiedSummary;
    }
}
