<section>
    <div class="space-y-6">

        {{-- Campo Nome --}}
        <div>
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input
                id="name"
                name="name"
                type="text"
                class="mt-1 block w-full"
                value="{{ old('name', $contact->name ?? '') }}"
                required
                autofocus
            />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        {{-- Campo Contato --}}
        <div>
            <x-input-label for="contact" :value="__('Contato')" />
            <x-text-input
                id="contact"
                name="contact"
                type="text"
                class="mt-1 block w-full"
                value="{{ old('contact', $contact->contact ?? '') }}"
                required
            />
            <x-input-error :messages="$errors->get('contact')" class="mt-2" />
        </div>

        {{-- Campo Email --}}
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input
                id="email"
                name="email"
                type="email"
                class="mt-1 block w-full"
                value="{{ old('email', $contact->email ?? '') }}"
                required
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

    </div>
</section>
