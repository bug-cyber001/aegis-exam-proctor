<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
            Create New Aegis Exam
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="/exams" method="POST">
                    @csrf
                    <div>
                        <x-input-label for="title" :value="__('Exam Title')" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="duration" :value="__('Duration (Minutes)')" />
                        <x-text-input id="duration" name="duration" type="number" class="mt-1 block w-full" value="60" />
                    </div>

                    <div class="mt-4">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="is_ai_proctoring_enabled" checked class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                            <span class="ml-2 text-sm text-gray-600">Enable Aegis AI Anti-Cheating</span>
                        </label>
                    </div>

                    <div class="mt-6">
                        <x-primary-button>Save Exam</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>