<nav class="bg-gray-800 text-white p-4 py-3 flex justify-between items-center">
    <div>
        <p class="text-xl font-bold">CultureIQ</p>
    </div>
    <div class="flex items-center space-x-4 gap-4">
        @auth
            <a href="{{ route('statistics')}}" class="text-blue-300">mes stats</a>
            <a href="{{route('profile.edit')}}" class="text-gray-300">{{ auth()->user()->name }}</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded">Se déconnecter</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded">Se connecter</a>
        @endauth
    </div>
</nav>
