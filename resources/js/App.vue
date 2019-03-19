<template>
    <!-- @include('frontend.modules.admin.header') -->

    <div class="page-content">
  <!-- @include('frontend.modules.admin.aside') -->

      <main class="page-main">
        <!-- {{-- @yield('content') --}} -->
        <h3>hello world!</h3>
        <router-view></router-view>
      </main>
    </div>
  <!-- @include('frontend.modules.admin.footer') -->
</template>


<script>
export default {
  
}
</script>