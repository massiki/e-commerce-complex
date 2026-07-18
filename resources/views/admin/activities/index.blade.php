@extends('layouts.admin')

@section('content')
  <div class="main-content-inner">
    <div class="main-content-wrap">
      <div class="flex items-center flex-wrap justify-between gap20 mb-27">
        <h3>Activity Logs</h3>
        <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
          <li>
            <a href="{{ route('admin.dashboard') }}">
              <div class="text-tiny">Dashboard</div>
            </a>
          </li>
          <li>
            <i class="icon-chevron-right"></i>
          </li>
          <li>
            <div class="text-tiny">Activity Logs</div>
          </li>
        </ul>
      </div>

      <div class="wg-box">
        <div class="flex items-center justify-between gap10 flex-wrap">
          <div class="wg-filter flex-grow">
            <form class="form-search" method="GET" action="{{ route('admin.activities.index') }}">
              <fieldset class="name">
                <input type="text" placeholder="Search activity..." class="" name="search" tabindex="2"
                  value="{{ request('search') }}">
              </fieldset>
              <div class="button-submit">
                <button class="" type="submit"><i class="icon-search"></i></button>
              </div>
            </form>
          </div>
        </div>
        <div class="wg-table table-all-user">
          <div class="table-responsive">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>User</th>
                  <th>Activity</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($activities as $activity)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $activity->user?->name ?? 'System' }}</td>
                    <td>{{ $activity->activity }}</td>
                    <td>{{ $activity->created_at->format('d M Y H:i') }}</td>
                    <td>
                      <div class="list-icon-function">
                        <a href="#">
                          <div class="item edit">
                            <i class="icon-edit-3"></i>
                          </div>
                        </a>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="5" class="text-center">No activity logs found</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
          <div class="divider"></div>
          <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
            {{ $activities->links('pagination::bootstrap-5') }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
