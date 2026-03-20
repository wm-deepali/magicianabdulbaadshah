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
</style>

<div class="main-section">
  @include('admin.header')

  <div class="container-fluid">

    <!-- Content Start -->
    <div class="row">

      <!-- Congratulations Card -->
      <div class="col-12 mb-4">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden"
          style="background: linear-gradient(135deg, #e8f1ff, #f3e8ff, #fff1e6);">

          <div class="card-body p-4">
            <div class="row align-items-center">

              <div class="col-md-8">
                <h3 class="fw-bold mb-2" style="color:#1e3a8a;">
                  Congratulations {{ auth()->user()->name }}
                </h3>

                <p class="mb-0 fs-6" style="color:#64748b;">
                  आपका Bayepur Bazaar Admin Dashboard में स्वागत है। आज आपने {{ $todayListings }} नई listings और {{ $todayEnquiries }} enquiries प्राप्त की हैं
                </p>
                
              </div>

              <div class="col-md-4 text-end">
                <h1 class="fw-bold display-4 mb-0" style="color:#ea580c;">+32%</h1>
                <small style="color:#64748b;">इस सप्ताह की वृद्धि</small>
              </div>

            </div>
          </div>

        </div>
      </div>

      <!-- Welcome Card -->
      <!--    <div class="col-12 mb-4">
                <div class="card border-0 shadow-sm rounded-4"
                    style="background: linear-gradient(135deg, #4338ca, #7c3aed); color:white;">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-2">Welcome Back ╨Б╨п╨б╨Ы</h4>
                        <p class="mb-0 opacity-75">
                            Manage listings, enquiries, members and website activities from one place.
                            Stay updated with your daily business growth and customer engagement.
                        </p>
                    </div>
                </div>
            </div> -->

    </div>

    <!-- Stats Cards Separate Row -->
    <div class="row g-4">

      <div class="col-lg-3 col-md-6">
        <div class="card border-0 shadow-sm rounded-4 stats-card h-100">
          <div class="card-body d-flex justify-content-between align-items-center px-3 py-3">
            <div>
              <small class="text-muted fw-semibold">कुल लिस्टिंग्स</small>
              <h2 class="fw-bold mb-1">{{ $totalListings }}</h2>
              <small class="text-success fw-semibold">
                आज की {{ $todayListings }}
              </small>
            </div>
            <div class="icon-box bg-success-subtle">
              <i class="fa fa-store text-success"></i>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="card border-0 shadow-sm rounded-4 stats-card h-100">
          <div class="card-body d-flex justify-content-between align-items-center px-3 py-3">
            <div>
              <small class="text-muted fw-semibold">नई Enquiries</small>
              <h2 class="fw-bold mb-1">{{ $totalEnquiries }}</h2>
              <small class="text-warning fw-semibold">आज की {{ $todayEnquiries }}</small>
            </div>
            <div class="icon-box bg-warning-subtle">
              <i class="fa fa-envelope text-warning"></i>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="card border-0 shadow-sm rounded-4 stats-card h-100">
          <div class="card-body d-flex justify-content-between align-items-center px-3 py-3">
            <div>
              <small class="text-muted fw-semibold">सक्रिय सदस्य</small>
              <h2 class="fw-bold mb-1">{{ $activeMembers }}</h2>
              <small class="text-primary fw-semibold">
                आज {{ $todayMembers }} नए सदस्य
              </small>
            </div>
            <div class="icon-box bg-primary-subtle">
              <i class="fa fa-users text-primary"></i>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="card border-0 shadow-sm rounded-4 stats-card h-100">
          <div class="card-body d-flex justify-content-between align-items-center px-3 py-3">
            <div>
              <small class="text-muted fw-semibold">कुल Views</small>
              <h2 class="fw-bold mb-1">12,840</h2>
              <small class="text-success fw-semibold">+22% कल से</small>
            </div>
            <div class="icon-box bg-success-subtle">
              <i class="fa fa-eye text-success"></i>
            </div>
          </div>
        </div>
      </div>

    </div>


    <!-- Table -->
    <!-- Recent Enquiries -->
    <div class="row mt-4">
      <div class="col-12">
        <div class="card border-0 shadow-sm rounded-4">
          <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center py-3">
            <h5 class="mb-0 fw-bold text-dark">Recent Enquiries (Last 7 Days)</h5>

          </div>

          <div class="table-responsive">
            <table class="table align-middle mb-0">
              <thead style="background:#f8fafc;">
                <tr>
                  <th>Date & Time</th>
                  <th>Business Name</th>
                  <th>Mobile Number</th>
                  <th>Category Name</th>
                  <th>View</th>
                </tr>
              </thead>
              <tbody>
                @forelse($recentEnquiries as $enquiry)
                  <tr>
                    <td>{{ $enquiry->created_at->format('d M Y, h:i A') }}</td>
                    <td>{{ $enquiry->name }}</td>
                    <td>{{ $enquiry->mobile }}</td>
                    <td>{{ $enquiry->subject ?? '-' }}</td>
                    <td>
                      <button class="btn btn-sm btn-primary rounded-pill px-3">View</button>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="5" class="text-center">No Enquiries Found</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


    <!-- Mandal Members Request -->
    <div class="row mt-4 mb-4">
      <div class="col-12">
        <div class="card border-0 shadow-sm rounded-4">
          <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center py-3">
            <h5 class="mb-0 fw-bold text-dark">Mandal Members Request</h5>

          </div>

          <div class="table-responsive">
            <table class="table align-middle mb-0">
              <thead style="background:#f8fafc;">
                <tr>
                  <th>Date & Time</th>
                  <th>Member Name</th>
                  <th>Mobile Number</th>
                  <th>Mandal Name</th>
                  <th>View</th>
                </tr>
              </thead>
              <tbody>
                @forelse($mandalRequests as $member)
                  <tr>
                    <td>{{ $member->created_at->format('d M Y, h:i A') }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->mobile }}</td>
                    <td>{{ $member->mandal->name ?? '-' }}</td>
                    <td>
                      <button class="btn btn-sm btn-success rounded-pill px-3">View</button>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="5" class="text-center">No Requests Found</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Table Ends -->
    @include('admin.footer')
  </div>
</div>