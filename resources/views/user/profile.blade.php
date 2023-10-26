@extends('layouts.app')

@section('title', 'Profile')

@push('style')
    <style>
        .card {
            width: 90%;
            background-color: #ffffff;
            /* border: none; */
            /* cursor: pointer; */
            /* transition: all 0.5s; */
        }

        .image img {
            transition: all 0.5s
        }

        .card:hover .image img {
            transform: scale(1.5)
        }

        .image-profil {
            height: 140px;
            width: 140px;
            border-radius: 50%
        }

        .name {
            font-size: 22px;
            font-weight: bold
        }

        .idd {
            font-size: 14px;
            font-weight: 600
        }

        .idd1 {
            font-size: 12px
        }

        .number {
            font-size: 22px;
            font-weight: bold
        }

        .follow {
            font-size: 12px;
            font-weight: 500;
            color: #444444
        }

        .btn1 {
            height: 40px;
            width: 150px;
            border: none;
            background-color: #000;
            color: #aeaeae;
            font-size: 15px
        }

        .text span {
            font-size: 13px;
            color: #545454;
            font-weight: 500
        }

        .icons i {
            font-size: 19px
        }

        hr .new1 {
            border: 1px solid
        }

        /* .join {
            font-size: 14px;
            color: #a0a0a0;
            font-weight: bold
        } */

        .date {
            background-color: #ccc
        }

        .progress-file {
            display: inline-block;
            box-sizing: border-box;
            width: 22.6vw;
            height: 2em;
            /* margin-left: 1em; */
            border: 1px solid #8897e3;
            line-height: 2;
            vertical-align: middle;
            color: #5f76e8;
        }
        .progress-bar-file {
            display: inline-block;
            width: 0;
            height: 100%;
            text-align: center;
            line-height: inherit;
            color: #5f76e8;
            background-color: #ced4eb;
        }
        [data-progress] {
            display: inline-block;
            width: 5em;
            height: 2em;
            font: inherit;
            cursor: pointer;
        }

        tr.spaceUnder>td {
            padding-bottom: 1em;
        }
    </style>
@endpush

@section('main')
<div class="container-fluid">
    <div class="container mt-4 mb-4 p-3">
        <div class="row">
            <div class="col-5">
                <div class="card p-4">
                    <div class="image"> 
                        <div class="d-flex flex-column justify-content-center align-items-center mb-4">
                            {{-- image --}}
                            <button class="image-profil btn-secondary"> 
                                <img src="{{ asset('assets/images/users/d3.jpg') }}" class="rounded-circle" height="100" width="100" />
                            </button> 
                            {{-- name --}}
                            <span class="name mt-3">Eleanor Pena</span> 
                            {{-- kategori user --}}
                            <button type="button" class="btn btn-outline-danger" style="border-radius: 15px">Premium</button>
                        </div>

                        <div class="float-left">
                            <div class="row" style="display: flex; justify-content: space-between; align-items: center;">
                                <div class="col-4">                            
                                    <button type="button" class="btn btn-outline-danger" style="border-radius: 15px"><i class="fas fa-check"></i></button>
                                </div>
                                <div class="col-8" style="font-size:10px ">
                                    12 File
                                    <br>
                                    File Perhitungan
                                </div>
                            </div>
                        </div>
                        <div class="float-right">
                            <div class="row" style="display: flex; justify-content: space-between; align-items: center;">
                                <div class="col-4">                            
                                    <button type="button" class="btn btn-outline-danger" style="border-radius: 15px"><i class="icon-star"></i></button>
                                </div>
                                <div class="col-8" style="font-size:10px ">
                                    2 Kategori
                                    <br>
                                    Kategori Regulasi
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="rounded mt-4 text-dark"> 
                            <span>Details</span> 
                        </div>
                        <hr>
                        <table class="text-dark h6">
                            <tr class="spaceUnder">
                                <td>Username</td>
                                <td width="10">:</td>
                                <td></td>
                            </tr>
                            <tr class="spaceUnder">
                                <td>Email</td>
                                <td>:</td>
                                <td>{{ $profile->email }}</td>
                            </tr>
                            <tr class="spaceUnder">
                                <td>Status</td>
                                <td>:</td>
                                <td>{{ $profile->is_active = 1 ? 'Active' : 'Non Active' }}</td>
                            </tr>
                            <tr class="spaceUnder">
                                <td>Role</td>
                                <td>:</td>
                                <td>{{ $userRole }}</td>
                            </tr>
                        </table>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <button id="btnSearch" class="btn btn-primary btn-md center-block" Style="width: 100px;" OnClick="btnSearch_Click" >Edit</button>
                                 <button id="btnClear" class="btn btn-danger btn-md center-block" Style="width: 100px;" OnClick="btnClear_Click" >Blokir</button>
                             </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-transparent" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <button type="button" class="btn btn-outline-danger" style="border-radius: 15px">Premium</button>
                        </div>
                        <div class="float-right">
                            <span class="text-primary font-weight-bold">Rp.200.000</span><span>/Kapasitas</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="mb-3">
                            <tr>
                                <td width="30">
                                    <input type="radio" style="transform: scale(1.2);">
                                </td>
                                <td>
                                    <div>100 capasity Files</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="radio" style="transform: scale(1.2);">
                                </td>
                                <td>
                                    <div>Basic Support</div>
                                </td>
                            </tr>
                        </table>
                        <div class="float-left">Kapasitas File</div>
                        <div class="float-right">100 File</div>
                        <br>
                        <div data-progress="html" data-value="70">
                            <span class="progress-file">
                                <span id="html" class="progress-bar-file"></span>
                            </span>
                        </div>
                        <p>
                            <small>Terpakai : 12 File</small>
                        </p>
                    </div>
                    <div class="card-footer bg-transparent">
                        <button class="btn btn-block btn-primary">UPGRADE PLAN</button>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <div class="card">
                    <div class="card-body">
                        <p> 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit beatae 
                            voluptates cumque ea quaerat aperiam laboriosam labore tempore architecto molestias 
                            voluptate assumenda voluptatem ducimus consectetur ullam sapiente, totam blanditiis 
                            quibusdam!
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit beatae 
                            voluptates cumque ea quaerat aperiam laboriosam labore tempore architecto molestias 
                            voluptate assumenda voluptatem ducimus consectetur ullam sapiente, totam blanditiis 
                            quibusdam!
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit beatae 
                            voluptates cumque ea quaerat aperiam laboriosam labore tempore architecto molestias 
                            voluptate assumenda voluptatem ducimus consectetur ullam sapiente, totam blanditiis 
                            quibusdam!
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit beatae 
                            voluptates cumque ea quaerat aperiam laboriosam labore tempore architecto molestias 
                            voluptate assumenda voluptatem ducimus consectetur ullam sapiente, totam blanditiis 
                            quibusdam!
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit beatae 
                            voluptates cumque ea quaerat aperiam laboriosam labore tempore architecto molestias 
                            voluptate assumenda voluptatem ducimus consectetur ullam sapiente, totam blanditiis 
                            quibusdam!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <p> 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit beatae 
                            voluptates cumque ea quaerat aperiam laboriosam labore tempore architecto molestias 
                            voluptate assumenda voluptatem ducimus consectetur ullam sapiente, totam blanditiis 
                            quibusdam!
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit beatae 
                            voluptates cumque ea quaerat aperiam laboriosam labore tempore architecto molestias 
                            voluptate assumenda voluptatem ducimus consectetur ullam sapiente, totam blanditiis 
                            quibusdam!
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit beatae 
                            voluptates cumque ea quaerat aperiam laboriosam labore tempore architecto molestias 
                            voluptate assumenda voluptatem ducimus consectetur ullam sapiente, totam blanditiis 
                            quibusdam!
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
    <script>
        // Récup. éléments concernés
        var oBtns = $("[data-progress]");
        //Action au click
        oBtns.on("click", function () {
        var $this = $(this);
        var progress = $this.data("progress");
        var size = $this.data("value");
        $("#" + progress)
            .stop()
            .css({
            width: 0
            })
            .animate({
            width: size + "%"
            }, {
            duration: 2000,
            step: function (valeur, fx) {
                var elem = $(fx.elem);
                elem.text(parseInt(valeur,10) + "%")
            }
            });
        });
        // Déclenche l'animation
        oBtns.trigger("click");
    </script>
@endpush
