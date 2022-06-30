<div class="row">
    <div class="col-md-12">
        <h3>Welcome, {{ucfirst($user->firstname).' '.($user->middlename!=''?ucfirst($user->middlename):'').' '.ucfirst($user->lastname)}}!</h3>
        @if ($user->last_login_at!='')
        Your last visit was <strong class="badge badge-pill" style="background-color:rgb(10, 122, 150); color:seashell">{{ date('D d F, Y h:ia',strtotime($user->last_login_at)) }}</strong>
        @else
        <p class="badge badge-pill" style="background-color: rgb(10, 122, 150); color:seashell">You are logging in for the first time.</p>
        @endif
        <hr>

        <div><span class="fa fa-briefcase"></span> {{ $user->role->name }}</div>
        <div><span class="fa fa-phone"></span> {{ $user->phone }}</div>
        <div><span class="fa fa-envelope"></span> {{ $user->email }}</div>
        <div><span class="fa fa-clock-o"></span> {{ date('D d F, Y h:ia',strtotime($user->created_at)) }} [Date created]</div>
        <div>
            Account Status
            @if ($user->isactive==1)
            <span class="badge badge-success badge-pill"
                style="background-color: green; color:seashell"> Active</span>
            @else
            <span class="badge badge-danger badge-pill"
                style="background-color: crimson; color:seashell"> Inactive</span>

            @endif
        </div>
        <div>
           Profile Updated?
            @if ($user->profileupdated==1)
            <span class="badge badge-success badge-pill"
                style="background-color: green; color:seashell"> Yes</span>
            @else
            <span class="badge badge-danger badge-pill"
                style="background-color: crimson; color:seashell"> No</span>

            @endif
        </div>


        <hr>


    </div>
</div>
