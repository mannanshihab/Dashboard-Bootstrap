<div class="layout-wrapper layout-content-navbar">
    
    <div class="layout-container">
        @livewire('partials.layout-menu')
        <!-- Layout container -->
        <div class="layout-page">
            @livewire('partials.layout-navbar')
            <!-- Content wrapper -->
            <div class="content-wrapper">

            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <!-- Paste your content here -->
            </div>
            <!-- / Content -->
            
            @livewire('partials.content-footer')
            <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>

<!-- Drag Target Area To SlideIn Menu On Small Screens -->
<div class="drag-target"></div>
</div> 
