<x-adminheader title="main" keywords="Service,Requirement" description="Rquirement"/>


<div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h3 class=" mb-3">CRM Applicant data</h3>
      <ul class="breadcrumbs mb-3">
        <li class="nav-home">
          <a href="#">
            <i class="icon-home"></i>
          </a>
        </li>
        <li class="separator">
          <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
          <a href="#">Tables</a>
        </li>
        <li class="separator">
          <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
          <a href="#">Datatables</a>
        </li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Basic</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table
                id="basic-datatables"
                class="display table table-striped table-hover"
              >
                <thead>
                  <tr>
                    <th>S.no</th>
                    <th>Pic</th>
                    <th>Name</th>
                    <th>gender</th>
                    <th>Nationality</th>
                    <th>Tel.</th>
                    <th>email</th>
                    <th>birthday</th>
                    <th>Disponibility</th>
                    <th>Language</th>
                    <th>Goods</th>
                    <th>Activities</th>
                    <th>Licence</th>
                    
                    <th>mobility</th>
                    <th>Start Work</th>
                    <th>Work In</th>
                    <th>Recruiter</th>
                    <th>Contact</th>
                    <th>Rating</th>


                   
                  </tr>
                </thead>
                <tbody>
                  @php
                  $j = 0;
              @endphp

                    @foreach ($applicant as $item)
                    @php $j++; @endphp
                    <tr data-applicant-id="{{ $item->id }}">
                        <td>{{ $j }}</td>
                        <td><img src="{{ asset($item->profile_pic) }}" alt="" width="50px" height="50px"></td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->gender }}</td>
                        <td>{{ $item->nationality }}</td>
                        <td>{{ $item->tel }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->birthday }}</td>
                        <td>{{ $item->disponibility }}</td>
                        <td>
                            @php
                                $languages = json_decode($item->Language);
                            @endphp
                            @if($languages)
                                <ol>
                                    @foreach($languages as $language)
                                        <li>{{ $language }}</li>
                                    @endforeach
                                </ol>
                            @else
                                No languages available
                            @endif
                        </td>
                        <td>
                            @php
                                $Goods = json_decode($item->goods);
                            @endphp
                            @if($Goods)
                                <ol>
                                    @foreach($Goods as $Good)
                                        <li>{{ $Good }}</li>
                                    @endforeach
                                </ol>
                            @else
                                No Goods available
                            @endif
                        </td>
                        <td>
                        @php
                            $activities = json_decode($item->activities);
                        @endphp
                        @if($activities)
                            <ol>
                                @foreach($activities as $activitie)
                                    <li>{{ $activitie }}</li>
                                @endforeach
                            </ol>
                        @else
                            No activities available
                        @endif
                        </td>
                        <td>{{ $item->Licence }}</td>
                        <td>{{ $item->Mobility }}</td>
                        <td>{{ $item->start_work }}</td>
                        <td>{{ $item->work_in }}</td>
                        <td>
                            <select name="recruiter" class="form-select" id="recruiterSelect">
                                <option value="">Select Recruiter</option>
                                @foreach($recruiters as $recruiter)
                                    <option value="{{ $recruiter->id }}" {{ $item->Recruiter == $recruiter->id ? 'selected' : '' }}>
                                        {{ $recruiter->name }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        <select name="contact" class="form-select">
                            <option value="">Select Contact</option>
                            <option value="contacted" {{ $item->contact == 'contacted' ? 'selected' : '' }}>Contacted</option>
                            <option value="Not answered 1" {{ $item->contact == 'Not answered 1' ? 'selected' : '' }}>Not answered 1</option>
                            <option value="Not answered 2" {{ $item->contact == 'Not answered 2' ? 'selected' : '' }}>Not answered 2</option>
                            <option value="Out" {{ $item->contact == 'Out' ? 'selected' : '' }}>Out</option>
                        </select>
                    </td>

<td>
  <div class="stars" data-applicant-id="{{ $item->id }}">
      @for ($i = 1; $i <= 5; $i++)
          <span class="star {{ $item->rating >= $i ? 'filled' : '' }}" data-value="{{ $i }}">&#9733;</span>
      @endfor
  </div>
</td>

</tr>
@endforeach



                </tbody>
              </table>
              <div class="col-md-12 pt-5">
                {{$applicant->links()}}
            </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('select[name="recruiter"], select[name="contact"]').on('change', function() {
        var selectName = $(this).attr('name');
        var selectValue = $(this).val();
        var applicantId = $(this).closest('tr').data('applicant-id');
        
        if (selectValue) {
            $.ajax({
                url: "{{ route('updateApplicantField') }}", // Replace with your route
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    applicant_id: applicantId,
                    field_name: selectName,
                    field_value: selectValue
                },
                success: function(response) {
                    if (response.success) {
                        alert(selectName + ' updated successfully!');
                    } else {
                        alert('Error updating ' + selectName + '.');
                    }
                }
            });
        }
    });
});

$(document).ready(function() {
    $('.stars .star').on('click', function() {
        var star = $(this);
        var rating = star.data('value');
        var applicantId = star.closest('.stars').data('applicant-id');

        // Highlight the selected stars
        star.siblings().removeClass('filled');
        star.addClass('filled').prevAll().addClass('filled');

        $.ajax({
            url: "{{ route('updateApplicantField') }}", // Replace with your route
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                applicant_id: applicantId,
                field_name: 'rating',
                field_value: rating
            },
            success: function(response) {
                if (response.success) {
                    alert('Rating updated successfully!');
                } else {
                    alert('Error updating rating.');
                }
            }
        });
    });
});
</script>

<x-adminfooter />