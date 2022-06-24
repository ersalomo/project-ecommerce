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
                                        <input type="text" class="form-control form-control-sm" value="8"
                                            size="3" aria-label="Invoices count">
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
                                        <th>Nama Product</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Desc</th>
                                        <th>Created_at</th>
                                        <th>Update_at</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select invoice"></td>
                                            <td><span
                                                    class="text-muted">{{ $loop->iteration + $transactions->firstItem() }}</span>
                                            </td>
                                            <td><a href="invoice.html" class="text-reset"
                                                    tabindex="-1">{{ $transaction->getUser->name }}</a></td>
                                            <td>
                                                {{-- {{ $transaction->category_id }} --}}
                                            </td>
                                            <td>
                                                {{-- {{ $transaction->price }} --}}
                                            </td>
                                            <td>

                                            </td>
                                            <td>
                                                <span class="badge bg-success me-1"></span>
                                                {{ $transaction->created_at }}

                                            </td>
                                            {{-- <td>{{ $product->updated_at }}</td> --}}
                                            <td class="text-end">
                                                <span class="dropdown">
                                                    <button class="btn dropdown-toggle align-text-top"
                                                        data-bs-boundary="viewport"
                                                        data-bs-toggle="dropdown">Actions</button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">
                                                            Action
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            Another action
                                                        </a>
                                                    </div>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            <p class="m-0 text-muted">Showing <span>1</span> to
                                <span>{{ $products->perPage() }}</span> of
                                <span>{{ $products->total() }}</span>
                                entries
                            </p>
                            <ul class="pagination m-0 ms-auto">

                                {{ $products->links() }}

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
