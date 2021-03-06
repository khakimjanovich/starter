<x-app-layout>
    <x-slot name="header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{\Illuminate\Support\Str::ucfirst('dashboard')}}</h1>
                </div>
                <x-breadcrumb/>
            </div>
        </div>
    </x-slot>
    <x-management.table>
        <x-slot name="header">
            <div class="card-header">
                <h3 class="card-title">{{__('Users table')}}</h3>
                @can('users.store')
                    <a href="{{ route('users.create') }}" class="btn btn-success btn-sm float-right">
                        <span class="fas fa-plus-circle"></span>
                        {{__('Create a user')}}
                    </a>
                @endcan
            </div>
        </x-slot>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>{{__('No')}}</th>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Email')}}</th>
                    <th>{{__('Role')}}</th>
                    <th>{{__('Created at')}}</th>
                    <th>{{__('Actions')}}</th>
                </tr>
                </thead>
                <tbody>
                @php($j = 1)
                @foreach($users as $user)
                    <tr>
                        <td>{{$j}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->roles->first()?->name}}</td>
                        <td>{{$user->created_at->format('d M Y H:i')}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{route('users.edit',$user->id)}}"
                                   class="btn btn-sm btn-warning">{{__('Update')}}</a>
                                <form action="{{ route('users.destroy',$user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger btn-sm"
                                                onclick="if (confirm('Are you sure to delete?')) {this.form.submit()}"> {{__('Delete')}}</button>
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @php($j++)
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>{{__('No')}}</th>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Email')}}</th>
                    <th>{{__('Role')}}</th>
                    <th>{{__('Created at')}}</th>
                    <th>{{__('Actions')}}</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </x-management.table>
</x-app-layout>
