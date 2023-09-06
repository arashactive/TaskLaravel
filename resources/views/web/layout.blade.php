<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>warnke panel</title>
  @include('web.layouts.header')
</head>

<body>
  <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    @include('web.layouts.aside')
    <div class="flex flex-col flex-1 w-full">
      @include('web.layouts.head')
      <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
          @yield('content')
        </div>
      </main>
    </div>
  </div>

  @livewireScripts
</body>