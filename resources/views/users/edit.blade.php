<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
                <div class="max-w-md w-full space-y-8">
                    <div>
                        <img class="mx-auto h-12 w-auto"
                             src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
                        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                            Edit User
                        </h2>
                    </div>
                    <form class="mt-8 space-y-6" action="{{route('users.update',$user['id'])}}" method="POST">
                        @csrf
                        @method('PUT')
                        @if ($errors->any())
                            <div class="bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                                @foreach ($errors->all() as $error)
                                    <span class="font-medium">{{$error }}</span>
                                @endforeach
                            </div>
                        @endif
                        <div class="rounded-md shadow-sm -space-y-px">
                            <div>
                                <label for="email-address" class="sr-only">Name</label>
                                <input id="email-address" value="{{$user['name']}}" name="name" type="text" autocomplete="email" required
                                       class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                       placeholder="Name">
                            </div>
                            <div>
                                <label for="email-address" class="sr-only">Email adres</label>
                                <input id="email-address" value="{{$user['email']}}" name="email" type="email" autocomplete="email" required
                                       class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                       placeholder="Email address">
                            </div>
                            <div>


                                <label for="logo" class="sr-only">Role</label>
                                <div class="relative inline-block w-full text-gray-700">
                                    <select name="role" class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline" placeholder="Regular input">
                                        @foreach($roles as $role)
                                        <option value="{{$role->name}}" {{$user->hasRole($role->name)? 'selected' : ''}}>{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit"
                                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <!-- Heroicon name: solid/lock-closed -->
          </span>
                                Edit User
                            </button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
    </div>

    </div>
    </div>
</x-app-layout>
