<x-app-layout>
    <x-slot name="header">
        <h2 class="text-black-900">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex flex-col items-center">
            <div class="w-full max-w-xl">
                <div class="bg-white p-6 rounded-lg shadow-md text-black-900">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="w-full max-w-xl mt-8">
                <div class="bg-white p-6 rounded-lg shadow-md text-black-900">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="w-full max-w-xl mt-8">
                <div class="bg-white p-6 rounded-lg shadow-md text-black-900">
                    @include('profile.partials.delete-user-form')
                    <div class="mspace-button mt-4 text-right">
                        <a href="{{ url('mspace') }}" class="btn btn-primary">Return to My space</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

