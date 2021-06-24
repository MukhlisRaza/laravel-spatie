@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posts
                    @role('writer|admin')
                    <a href="{{url('post/create')}}" class="create-post">Create</a>
                    @endrole
                </div>
                <div class="card-body">
                    <table class="table table-borderless">

                        <tbody>
                            @foreach($post as $posts)
                            <tr>
                                <th scope="row" style="width: 1%;">
                                    <ul>
                                        <li></li>
                                    </ul>
                                </th>
                                <td style="width: 90%;"><a href=""> {{$posts['title']}}</a></td>
                                <td style="width: 10%;">
                                    @can('edit post')
                                    <a href="{{url('post/'.$posts['id'].'/edit/')}}">Edit</a>
                                    @endcan
                                    @role('publisher|admin')
                                    <a href="{{url('post/'.$posts['id'].'/edit/')}}"> | Publisher</a>
                                    @endrole
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection