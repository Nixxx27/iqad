
@if(Session::has('flash_message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ Session::get('flash_message') }}
        {!! Html::image('public/images/success_check.png','Property of SkyLogistics',array('height'=>'15px','width'=>'auto')) !!}
        <strong><a href='home'> View All</a> </strong>


    </div>
@endif