<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <html>
<head>
<style>

    .glass-container {
      background-color: rgba(255, 255, 255, 0.15);
      border-radius: 10px;
      backdrop-filter: blur(10px);
      padding: 20px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .glass-container form {
      margin-bottom: 10px;
    }

    .glass-container textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #cccccc;
      border-radius: 4px;
      resize: vertical;
    }

    .glass-container input[type="submit"] {
      padding: 10px 20px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .glass-container textarea[readonly] {
      background-color: rgba(255, 255, 255, 0.2);
      border: 1px solid #cccccc;
    }

    .glass-container label {
      font-weight: bold;
      color: white;
    }

    #info {
      text-align: center;
      margin-top: 20px;
      font-style: italic;
      color: #888888;
    }
  </style>
</head>
    <body>
    <div class="glass-container">
    <form id="from_text" method="POST" action="{{ route('summarize') }}">
      @csrf
      <label for="fname">Paragraph:</label><br>
      <textarea name="text" rows="10" cols="90" placeholder="Enter the text to summarize"></textarea><br>
      
      <button type="submit" style="background-color: #272B2B; color: white; padding: 10px 20px; font-size: 16px; border: none; border-radius: 4px; cursor: pointer;">
        Summarize</button>
    </form>
    <br>
    <div>
    @isset($summary)
          <label for="text_summarized">Summarized:</label><br>
          <textarea id="text_summarized" rows="10" cols="90" readonly>{{ $summary }}</textarea>
    @endisset
    </div>
  </div>

  </body>
  

</x-app-layout>
