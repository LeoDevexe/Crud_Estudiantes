@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tables'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Estudiantes lista</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                           CI</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            NOMBRES</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            APELIIDOS</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            EMAIL</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            FECHA</th>
                                            <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ACCIÓN</th>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($estudiantes as $estudiante)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <span>{{$estudiante->cedula}}</span>
                                                </div>
                                            </div>
                                        </td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$estudiante->nombres}}l</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="mb-0 text-sm">{{$estudiante->apellidos}}</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="badge badge-sm bg-gradient-success">{{$estudiante->email}}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{$estudiante->created_at}}</span>
                                </td>
                                <td>
                                    <a href="{{route('estudiante.edit',$estudiante)}}" class="btn btn-success">Editar

                                    </a>
                                </td>
                                <td class="alling-middle text-center">
                                    <form action="{{route('estudiante.destroy',$estudiante)}}" method="post">
                                         @csrf
                                         @method('DELETE')
                                    <button type="submit" href="javascript:;" class="btn btn-primary"
                                        data-toggle="tooltip" data-original-title="Eliminar user">Eliminar
                                        </a>
                                    </form>
                                        </td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                            {{$estudiantes->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth.footer')
    </div>
@endsection
