<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            @if(session()->has('success'))
                                <div class="bg-blue-100 rounded-lg p-4 mb-4 text-sm text-blue-700" role="alert">
                                    <span class="font-medium">{{ session()->get('success') }}</span>
                                </div>
                            @endif
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        @lang('index.ad')
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        @lang('index.email')
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        @lang('index.rol')
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Delete</span>
                                    </th>
                                </tr>

                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($users as $user)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{$user->name}}
                                            </div>
                        </div>

                    </div>

                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">  {{$user->email}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @foreach($user->roles as $role)

                            {{$role->name}}
                        @endforeach
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <form method="POST" action="{{route('users.edit',$user->id)}}">
                                                    @csrf
                                                    @method('GET')
                                                </form>
                        <a href="{{route('users.edit',$user->id)}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <form method="POST" action="{{route('users.destroy',$user->id)}}">
                            @csrf
                            @method('DELETE')
                            <button  class="text-indigo-600 hover:text-indigo-900">Delete</button>
                        </form>

                    </td>
                    </tr>
                @endforeach


                <!-- More people... -->

                    </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

    </div>
    </div>
</x-app-layout>
