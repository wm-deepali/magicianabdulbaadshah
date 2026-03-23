@include('admin.top-header')

<style>
  .stats-card {
    transition: 0.3s ease;
  }

  .stats-card:hover {
    transform: translateY(-5px);
  }

  .icon-box {
    width: 52px;
    height: 52px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
  }

  .margin-right {
    margin-right: 1rem
  }
</style>

<div class="main-section">
  @include('admin.header')

  <div class="container-fluid">

    <!-- Welcome Card -->
    <div class="row">
      <div class="col-12 mb-4">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden"
          style="background: linear-gradient(135deg, #e8f1ff, #f3e8ff, #fff1e6);">

          <div class="card-body p-4">
            <h3 class="fw-bold mb-2" style="color:#1e3a8a;">
              Welcome, {{ auth()->user()->name }} 👋
            </h3>
            <p class="mb-0 text-muted">
              Manage your website content, services, and enquiries from here.
            </p>
          </div>

        </div>
      </div>
    </div>

    <!-- STATS CARDS -->
    <div class="row g-4">

      <!-- Services -->
      <div class="col-lg-3 col-md-6">
        <div class="card stats-card shadow-sm border-0 rounded-4 p-3">
          <div class="d-flex align-items-center">
            <div class="icon-box bg-primary text-white me-3 margin-right">
              <i class="fa-solid fa-wand-magic-sparkles"></i>
            </div>
            <div>
              <h5 class="mb-1">{{ $totalServices ?? 0 }}</h5>
              <small class="text-muted">Total Services</small>
            </div>
          </div>
        </div>
      </div>

      <!-- Packages -->
      <div class="col-lg-3 col-md-6">
        <div class="card stats-card shadow-sm border-0 rounded-4 p-3">
          <div class="d-flex align-items-center">
            <div class="icon-box bg-success text-white me-3  margin-right">
              <i class="fa-solid fa-box"></i>
            </div>
            <div>
              <h5 class="mb-1">{{ $totalPackages ?? 0 }}</h5>
              <small class="text-muted">Total Packages</small>
            </div>
          </div>
        </div>
      </div>

      <!-- Contacts -->
      <div class="col-lg-3 col-md-6">
        <div class="card stats-card shadow-sm border-0 rounded-4 p-3">
          <div class="d-flex align-items-center">
            <div class="icon-box bg-warning text-white me-3  margin-right">
              <i class="fa-solid fa-envelope"></i>
            </div>
            <div>
              <h5 class="mb-1">{{ $totalContacts ?? 0 }}</h5>
              <small class="text-muted">Enquiries</small>
            </div>
          </div>
        </div>
      </div>

      <!-- Gallery -->
      <div class="col-lg-3 col-md-6">
        <div class="card stats-card shadow-sm border-0 rounded-4 p-3">
          <div class="d-flex align-items-center">
            <div class="icon-box bg-danger text-white me-3  margin-right">
              <i class="fa-solid fa-image"></i>
            </div>
            <div>
              <h5 class="mb-1">{{ $totalImages ?? 0 }}</h5>
              <small class="text-muted">Gallery Images</small>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- RECENT CONTACTS -->
    <div class="card mt-5 shadow-sm border-0 rounded-4">
      <div class="card-header bg-white fw-bold">
        Recent Enquiries
      </div>

      <div class="card-body p-0">
        <table class="table mb-0">
          <thead class="bg-light">
            <tr>
              <th>Name</th>
              <th>Phone</th>
              <th>Service</th>
              <th>Date</th>
            </tr>
          </thead>

          <tbody>
            @forelse($recentContacts as $contact)
              <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->phone }}</td>
                <td>{{ optional($contact->service)->title }}</td>
                <td>{{ $contact->created_at->format('d M Y') }}</td>
              </tr>
            @empty
              <tr>
                <td colspan="4" class="text-center text-muted py-3">
                  No enquiries yet
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    @include('admin.footer')

  </div>
</div>