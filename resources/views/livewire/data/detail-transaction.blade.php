<div class="page-breadcrumb bg-white">
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Invoices</h3>
                        </div>
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                                <div class="text-muted">
                                    Show
                                    <div class="mx-2 d-inline-block">
                                        <select class="form-control form-control-sm" wire:model="paginator">
                                            @for ($i = 1; $i <= 10; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    entries
                                </div>
                                <div class="ms-auto text-muted">
                                    Search:
                                    <div class="ms-2 d-inline-block">
                                        <input type="text" class="form-control form-control-sm"
                                            aria-label="Search invoice">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th class="w-1"><input class="form-check-input m-0 align-middle"
                                                type="checkbox" aria-label="Select all invoices"></th>
                                        <th class="w-1">No.
                                            <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <polyline points="6 15 12 9 18 15"></polyline>
                                            </svg>
                                        </th>
                                        <th>Nama User</th>
                                        <th>Nama product</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Total/Item</th>
                                        <th>Status</th>
                                        <th>Created_at</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $dt)
                                        <tr>
                                            <td>
                                                <input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select invoice">
                                            </td>

                                            <td>
                                                <span class="text-muted">{{ $loop->iteration }}</span>
                                            </td>
                                            <td>{{ $dt->nama_user }}</td>
                                            <td>{{ $dt->product_name }}</td>
                                            <td>Rp. {{ $dt->price }}</td>
                                            <td>{{ $dt->qty }}</td>
                                            <td>Rp. {{ $dt->qty * $dt->price }}</td>
                                            <td> <span class="badge bg-success me-1"></span> Paid</td>
                                            <td class="col-1">{{ $dt->created_at }}</td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            <p class="m-0 text-muted">Showing <span>1</span> to
                                {{-- <span>{{ $datas->perPage() }}</span> of --}}
                                {{-- <span>{{ $datas->total() }}</span> --}}
                                entries
                            </p>
                            <ul class="pagination m-0 ms-auto">

                                {{-- {{ $datas->links() }} --}}

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
