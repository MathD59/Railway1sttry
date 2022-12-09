<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-white dark:text-gray-100">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-100 font-medium dark:text-gray-400">
            {{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées.') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
        @csrf
        @method('delete') 
    <x-danger-button>{{ __('Supprimer le compte') }}</x-danger-button>
    </form>
    
    
    
    
        <x-modal  name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-600 dark:text-gray-100">Êtes-vous sûr de vouloir supprimer votre compte ?</h2>

            <p class="mt-1 text-sm text-white dark:text-gray-400">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="Password" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="Password"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button onclick="closewindow()">
                    {{ __('Annuler') }}
                </x-secondary-button>
            

                <x-danger-button  class="ml-3">
                    {{ __('Supprimer le compte') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>


<script>

    function closewindow(){
        window.location.href = '';
   
    }
</script>