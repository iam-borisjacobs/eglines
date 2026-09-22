@extends('layouts.dash')
@section('title', $title)
@section('content')
@php
    $user = Auth::user();
    $nameParts = explode(' ', $user->name ?? '', 2);
    $defaultFirstName = $nameParts[0] ?? '';
    $defaultLastName = $nameParts[1] ?? ($user->l_name ?? '');
@endphp

<div class="container-fluid py-4">
    <!-- Header & Navigation -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h3 class="f-w-800 text-dark mb-1">Identity Verification</h3>
            <p class="text-muted f-13 mb-0">Submit legal identification for international KYC/AML compliance</p>
        </div>
        <div>
            <a href="{{ route('account.verify') }}" class="btn btn-outline-secondary rounded-pill px-3 py-2 f-12 f-w-600">
                <i class="fa-solid fa-arrow-left me-1"></i> Back to Verification Status
            </a>
        </div>
    </div>

    <!-- Alert Messages -->
    <x-danger-alert />
    <x-success-alert />
    <x-error-alert />

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm mb-4" role="alert">
            <div class="d-flex align-items-center mb-2">
                <i class="fa-solid fa-triangle-exclamation me-2 f-18"></i>
                <h6 class="f-w-700 mb-0">Please resolve the following issues:</h6>
            </div>
            <ul class="mb-0 ps-3 f-13">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-9 col-xl-8 col-12">
            <div class="card border shadow-sm mb-4" style="border-radius: 16px;">
                <div class="card-body p-4 p-md-5">
                    
                    <!-- Intro Header -->
                    <div class="text-center mb-4 pb-3 border-bottom">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 64px; height: 64px; background: rgba(99, 102, 241, 0.12); color: #6366f1;">
                            <i class="fa-solid fa-id-card-clip f-28"></i>
                        </div>
                        <h4 class="f-w-800 text-dark mb-2">Begin Your ID-Verification</h4>
                        <p class="text-muted f-13 mx-auto mb-0" style="max-width: 540px;">
                            To comply with global regulatory standards, each account holder must complete identity verification (KYC/AML) to safeguard funds and enable full platform privileges.
                        </p>
                    </div>

                    <form action="{{ route('kycsubmit') }}" method="POST" enctype="multipart/form-data" id="kycSubmissionForm">
                        @csrf

                        <!-- Section 1: Personal Details -->
                        <div class="mb-4">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span class="badge bg-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 24px; height: 24px; font-size: 11px;">1</span>
                                <h5 class="f-w-700 text-dark mb-0 f-16">Personal Details</h5>
                            </div>
                            <p class="text-muted f-12 mb-3">Please ensure details match your government identification document exactly.</p>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label f-w-600 f-13 text-dark">First Name <span class="text-danger">*</span></label>
                                    <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $defaultFirstName) }}" placeholder="e.g. John" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label f-w-600 f-13 text-dark">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $defaultLastName) }}" placeholder="e.g. Doe" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label f-w-600 f-13 text-dark">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email ?? '') }}" placeholder="name@example.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label f-w-600 f-13 text-dark">Phone Number <span class="text-danger">*</span></label>
                                    <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $user->phone ?? '') }}" placeholder="+1 234 567 8900" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label f-w-600 f-13 text-dark">Date of Birth <span class="text-danger">*</span></label>
                                    <input type="date" name="dob" class="form-control" value="{{ old('dob') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label f-w-600 f-13 text-dark">Social Media Profile / Handle</label>
                                    <input type="text" name="social_media" class="form-control" value="{{ old('social_media') }}" placeholder="Twitter, LinkedIn or Telegram handle">
                                    <small class="text-muted f-11">Optional, assists with faster manual approval</small>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4 text-muted opacity-25">

                        <!-- Section 2: Residential Address -->
                        <div class="mb-4">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span class="badge bg-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 24px; height: 24px; font-size: 11px;">2</span>
                                <h5 class="f-w-700 text-dark mb-0 f-16">Residential Address</h5>
                            </div>
                            <p class="text-muted f-12 mb-3">Provide your official residential address as indicated on your documents.</p>

                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label f-w-600 f-13 text-dark">Street Address <span class="text-danger">*</span></label>
                                    <input type="text" name="address" class="form-control" value="{{ old('address') }}" placeholder="Street number, apartment or suite" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label f-w-600 f-13 text-dark">City <span class="text-danger">*</span></label>
                                    <input type="text" name="city" class="form-control" value="{{ old('city') }}" placeholder="e.g. New York" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label f-w-600 f-13 text-dark">State / Province <span class="text-danger">*</span></label>
                                    <input type="text" name="state" class="form-control" value="{{ old('state') }}" placeholder="e.g. NY" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label f-w-600 f-13 text-dark">Nationality / Country <span class="text-danger">*</span></label>
                                    <input type="text" name="country" class="form-control" value="{{ old('country', $user->country ?? '') }}" placeholder="e.g. United States" required>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4 text-muted opacity-25">

                        <!-- Section 3: Document Type & Uploads -->
                        <div class="mb-4">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span class="badge bg-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 24px; height: 24px; font-size: 11px;">3</span>
                                <h5 class="f-w-700 text-dark mb-0 f-16">Document Upload</h5>
                            </div>
                            <p class="text-muted f-12 mb-3">Select the identification document type you will provide.</p>

                            <!-- Document Type Selector -->
                            <div class="row g-2 mb-4">
                                <div class="col-md-4">
                                    <label class="doc-type-card p-3 border rounded-3 text-center d-block cursor-pointer h-100" style="cursor: pointer; transition: all 0.2s;">
                                        <input type="radio" name="document_type" value="Int'l Passport" class="d-none doc-type-radio" {{ old('document_type', "Int'l Passport") == "Int'l Passport" ? 'checked' : '' }}>
                                        <i class="fa-solid fa-passport f-22 text-primary mb-2 d-block"></i>
                                        <span class="f-w-700 text-dark f-13 d-block">Int'l Passport</span>
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label class="doc-type-card p-3 border rounded-3 text-center d-block cursor-pointer h-100" style="cursor: pointer; transition: all 0.2s;">
                                        <input type="radio" name="document_type" value="National ID" class="d-none doc-type-radio" {{ old('document_type') == 'National ID' ? 'checked' : '' }}>
                                        <i class="fa-solid fa-id-card f-22 text-primary mb-2 d-block"></i>
                                        <span class="f-w-700 text-dark f-13 d-block">National ID Card</span>
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label class="doc-type-card p-3 border rounded-3 text-center d-block cursor-pointer h-100" style="cursor: pointer; transition: all 0.2s;">
                                        <input type="radio" name="document_type" value="Drivers License" class="d-none doc-type-radio" {{ old('document_type') == 'Drivers License' ? 'checked' : '' }}>
                                        <i class="fa-solid fa-address-card f-22 text-primary mb-2 d-block"></i>
                                        <span class="f-w-700 text-dark f-13 d-block">Driver's License</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Quality Guidance Note -->
                            <div class="p-3 rounded-3 mb-4 border" style="background: rgba(99, 102, 241, 0.04);">
                                <h6 class="f-w-700 text-dark mb-2 f-12 text-uppercase" style="letter-spacing: 0.04em;">
                                    <i class="fa-solid fa-circle-info text-primary me-1"></i> Document Criteria For Immediate Approval
                                </h6>
                                <ul class="list-unstyled mb-0 f-12 text-muted row g-2">
                                    <li class="col-sm-6"><i class="fa-solid fa-circle-check text-success me-1"></i> Document must be valid and not expired</li>
                                    <li class="col-sm-6"><i class="fa-solid fa-circle-check text-success me-1"></i> All 4 corners of the ID must be clearly visible</li>
                                    <li class="col-sm-6"><i class="fa-solid fa-circle-check text-success me-1"></i> Avoid light glare, blurriness, or reflections</li>
                                    <li class="col-sm-6"><i class="fa-solid fa-circle-check text-success me-1"></i> JPG, PNG, WEBP, or PDF accepted (Auto-optimized)</li>
                                </ul>
                            </div>

                            <!-- Document Upload Cards (Front & Back) -->
                            <div class="row g-4">
                                <!-- FRONT SIDE -->
                                <div class="col-md-6">
                                    <label class="form-label f-w-700 f-13 text-dark d-flex align-items-center justify-content-between">
                                        <span>Front Side of Document <span class="text-danger">*</span></span>
                                        <span class="badge bg-light-primary text-primary f-11">Front</span>
                                    </label>

                                    <div class="upload-dropzone p-3 border rounded-3 text-center position-relative" id="frontDropzone" style="background: #fafafa; border: 2px dashed #cbd5e1 !important; transition: all 0.25s; min-height: 200px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                        <!-- Hidden Real File Input -->
                                        <input type="file" name="frontimg" id="frontimgInput" accept="image/jpeg,image/png,image/jpg,image/webp,application/pdf" class="d-none" required>

                                        <!-- Empty State Placeholder -->
                                        <div id="frontEmptyState" class="w-100 py-3">
                                            <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 52px; height: 52px; background: rgba(99, 102, 241, 0.1); color: #6366f1;">
                                                <i class="fa-solid fa-cloud-arrow-up f-22"></i>
                                            </div>
                                            <p class="f-w-700 text-dark f-13 mb-1">Click to browse or take photo</p>
                                            <span class="text-muted f-11 d-block mb-3">JPEG, PNG, WEBP, or PDF (Max 25MB)</span>
                                            <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1.5 f-12" onclick="document.getElementById('frontimgInput').click();">
                                                <i class="fa-solid fa-camera me-1"></i> Choose Front File
                                            </button>
                                        </div>

                                        <!-- Active File Preview -->
                                        <div id="frontPreviewState" class="w-100 d-none text-center">
                                            <div class="position-relative d-inline-block mb-2">
                                                <img id="frontThumb" src="" alt="Front ID Preview" class="img-fluid rounded-3 border shadow-sm" style="max-height: 140px; object-fit: contain;">
                                                <div id="frontPdfBadge" class="d-none p-3 bg-white rounded-3 border shadow-sm">
                                                    <i class="fa-solid fa-file-pdf text-danger f-36 mb-1"></i>
                                                    <div class="f-12 f-w-600 text-dark">PDF Document</div>
                                                </div>
                                            </div>
                                            <div class="f-w-600 text-dark f-12 text-truncate px-2" id="frontFileName"></div>
                                            <div class="badge bg-light-success text-success rounded-pill px-2.5 py-1 f-10 mt-1" id="frontFileSize"></div>
                                            <div class="mt-2">
                                                <button type="button" class="btn btn-link text-primary f-12 p-0 me-2" onclick="document.getElementById('frontimgInput').click();">Change</button>
                                                <button type="button" class="btn btn-link text-danger f-12 p-0" onclick="clearUpload('front');">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- BACK SIDE -->
                                <div class="col-md-6">
                                    <label class="form-label f-w-700 f-13 text-dark d-flex align-items-center justify-content-between">
                                        <span>Back Side of Document <span class="text-danger">*</span></span>
                                        <span class="badge bg-light-primary text-primary f-11">Back</span>
                                    </label>

                                    <div class="upload-dropzone p-3 border rounded-3 text-center position-relative" id="backDropzone" style="background: #fafafa; border: 2px dashed #cbd5e1 !important; transition: all 0.25s; min-height: 200px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                        <!-- Hidden Real File Input -->
                                        <input type="file" name="backimg" id="backimgInput" accept="image/jpeg,image/png,image/jpg,image/webp,application/pdf" class="d-none" required>

                                        <!-- Empty State Placeholder -->
                                        <div id="backEmptyState" class="w-100 py-3">
                                            <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 52px; height: 52px; background: rgba(99, 102, 241, 0.1); color: #6366f1;">
                                                <i class="fa-solid fa-cloud-arrow-up f-22"></i>
                                            </div>
                                            <p class="f-w-700 text-dark f-13 mb-1">Click to browse or take photo</p>
                                            <span class="text-muted f-11 d-block mb-3">JPEG, PNG, WEBP, or PDF (Max 25MB)</span>
                                            <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1.5 f-12" onclick="document.getElementById('backimgInput').click();">
                                                <i class="fa-solid fa-camera me-1"></i> Choose Back File
                                            </button>
                                        </div>

                                        <!-- Active File Preview -->
                                        <div id="backPreviewState" class="w-100 d-none text-center">
                                            <div class="position-relative d-inline-block mb-2">
                                                <img id="backThumb" src="" alt="Back ID Preview" class="img-fluid rounded-3 border shadow-sm" style="max-height: 140px; object-fit: contain;">
                                                <div id="backPdfBadge" class="d-none p-3 bg-white rounded-3 border shadow-sm">
                                                    <i class="fa-solid fa-file-pdf text-danger f-36 mb-1"></i>
                                                    <div class="f-12 f-w-600 text-dark">PDF Document</div>
                                                </div>
                                            </div>
                                            <div class="f-w-600 text-dark f-12 text-truncate px-2" id="backFileName"></div>
                                            <div class="badge bg-light-success text-success rounded-pill px-2.5 py-1 f-10 mt-1" id="backFileSize"></div>
                                            <div class="mt-2">
                                                <button type="button" class="btn btn-link text-primary f-12 p-0 me-2" onclick="document.getElementById('backimgInput').click();">Change</button>
                                                <button type="button" class="btn btn-link text-danger f-12 p-0" onclick="clearUpload('back');">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4 text-muted opacity-25">

                        <!-- Consent & Submission -->
                        <div class="mb-4">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="1" id="consentCheck" required style="cursor: pointer;">
                                <label class="form-check-label f-13 text-dark cursor-pointer" for="consentCheck" style="cursor: pointer;">
                                    I hereby confirm that all information provided is accurate, current, and that the documents uploaded belong to me.
                                </label>
                            </div>

                            @if (Auth::user()->account_verify == 'Under review')
                                <div class="alert alert-warning d-flex align-items-center rounded-3 p-3 mb-3">
                                    <i class="fa-solid fa-clock-rotate-left me-2 f-18"></i>
                                    <div class="f-13">
                                        Your previous verification application is currently under review by compliance. You do not need to resubmit.
                                    </div>
                                </div>
                                <button type="button" class="btn btn-secondary rounded-pill px-4 py-2.5 f-14 f-w-700" disabled>
                                    Application Under Review
                                </button>
                            @else
                                <button type="submit" class="btn btn-primary rounded-pill px-5 py-2.5 f-14 f-w-700 shadow-sm" id="submitKycBtn">
                                    <i class="fa-solid fa-shield-check me-1"></i> Submit Verification Application
                                </button>
                            @endif
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
.doc-type-card.active-type {
    border-color: #6366f1 !important;
    background: rgba(99, 102, 241, 0.08) !important;
    box-shadow: 0 4px 12px rgba(99, 102, 241, 0.15);
}
.upload-dropzone:hover {
    border-color: #6366f1 !important;
    background: #f8faff !important;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Document Type Radio Highlight
    const radios = document.querySelectorAll('.doc-type-radio');
    function updateRadioStyles() {
        document.querySelectorAll('.doc-type-card').forEach(card => card.classList.remove('active-type'));
        radios.forEach(radio => {
            if (radio.checked) {
                radio.closest('.doc-type-card').classList.add('active-type');
            }
        });
    }
    radios.forEach(radio => {
        radio.addEventListener('change', updateRadioStyles);
        radio.closest('.doc-type-card').addEventListener('click', function () {
            radio.checked = true;
            updateRadioStyles();
        });
    });
    updateRadioStyles();

    // Setup Upload Handlers for Front & Back
    setupFileUploader('frontimgInput', 'frontDropzone', 'frontEmptyState', 'frontPreviewState', 'frontThumb', 'frontPdfBadge', 'frontFileName', 'frontFileSize');
    setupFileUploader('backimgInput', 'backDropzone', 'backEmptyState', 'backPreviewState', 'backThumb', 'backPdfBadge', 'backFileName', 'backFileSize');

    // Prevent Double Submissions & Show Loading State
    const form = document.getElementById('kycSubmissionForm');
    const submitBtn = document.getElementById('submitKycBtn');
    if (form && submitBtn) {
        form.addEventListener('submit', function (e) {
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-2"></i> Submitting Documents...';
        });
    }
});

// Helper to format file sizes
function formatBytes(bytes, decimals = 1) {
    if (!+bytes) return '0 B';
    const k = 1024;
    const dm = decimals < 0 ? 0 : decimals;
    const sizes = ['B', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return `${parseFloat((bytes / Math.pow(k, i)).toFixed(dm))} ${sizes[i]}`;
}

// Client-Side Canvas Image Compression
function compressImageFile(file, maxWidth = 1600, maxHeight = 1600, quality = 0.85) {
    return new Promise((resolve) => {
        // If not an image or is a PDF/GIF, resolve original
        if (!file.type.match(/image\/(jpeg|jpg|png|webp)/i)) {
            return resolve(file);
        }

        // If file is already small (< 1MB), no need to compress
        if (file.size < 1024 * 1024) {
            return resolve(file);
        }

        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function (event) {
            const img = new Image();
            img.src = event.target.result;
            img.onload = function () {
                let width = img.width;
                let height = img.height;

                if (width > height) {
                    if (width > maxWidth) {
                        height = Math.round((height * maxWidth) / width);
                        width = maxWidth;
                    }
                } else {
                    if (height > maxHeight) {
                        width = Math.round((width * maxHeight) / height);
                        height = maxHeight;
                    }
                }

                const canvas = document.createElement('canvas');
                canvas.width = width;
                canvas.height = height;

                const ctx = canvas.getContext('2d');
                ctx.drawImage(img, 0, 0, width, height);

                canvas.toBlob(
                    (blob) => {
                        if (!blob || blob.size >= file.size) {
                            // If compression didn't reduce size, keep original
                            return resolve(file);
                        }
                        const compressedFile = new File([blob], file.name.replace(/\.[^/.]+$/, "") + ".jpg", {
                            type: 'image/jpeg',
                            lastModified: Date.now()
                        });
                        resolve(compressedFile);
                    },
                    'image/jpeg',
                    quality
                );
            };
            img.onerror = function () {
                resolve(file);
            };
        };
        reader.onerror = function () {
            resolve(file);
        };
    });
}

function setupFileUploader(inputId, dropzoneId, emptyId, previewId, thumbId, pdfBadgeId, nameId, sizeId) {
    const input = document.getElementById(inputId);
    const dropzone = document.getElementById(dropzoneId);
    const emptyState = document.getElementById(emptyId);
    const previewState = document.getElementById(previewId);
    const thumb = document.getElementById(thumbId);
    const pdfBadge = document.getElementById(pdfBadgeId);
    const nameEl = document.getElementById(nameId);
    const sizeEl = document.getElementById(sizeId);

    if (!input || !dropzone) return;

    // Drag & Drop
    ['dragenter', 'dragover'].forEach(eventName => {
        dropzone.addEventListener(eventName, (e) => {
            e.preventDefault();
            e.stopPropagation();
            dropzone.style.borderColor = '#6366f1';
            dropzone.style.background = '#eef2ff';
        }, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropzone.addEventListener(eventName, (e) => {
            e.preventDefault();
            e.stopPropagation();
            dropzone.style.borderColor = '#cbd5e1';
            dropzone.style.background = '#fafafa';
        }, false);
    });

    dropzone.addEventListener('drop', (e) => {
        const dt = e.dataTransfer;
        const files = dt.files;
        if (files.length) {
            handleFileSelect(files[0]);
        }
    });

    input.addEventListener('change', function () {
        if (this.files && this.files.length) {
            handleFileSelect(this.files[0]);
        }
    });

    async function handleFileSelect(rawFile) {
        if (!rawFile) return;

        const origSize = rawFile.size;
        sizeEl.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-1"></i> Optimizing photo...';
        emptyState.classList.add('d-none');
        previewState.classList.remove('d-none');
        nameEl.innerText = rawFile.name;

        // Perform fast client-side compression
        const processedFile = await compressImageFile(rawFile);

        // Assign back to input using DataTransfer
        try {
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(processedFile);
            input.files = dataTransfer.files;
        } catch (e) {
            console.warn('DataTransfer not supported by browser, original file will be sent', e);
        }

        // Render preview
        if (processedFile.type === 'application/pdf') {
            thumb.classList.add('d-none');
            pdfBadge.classList.remove('d-none');
            sizeEl.innerText = `${formatBytes(processedFile.size)}`;
        } else {
            pdfBadge.classList.add('d-none');
            thumb.classList.remove('d-none');
            const reader = new FileReader();
            reader.onload = function (e) {
                thumb.src = e.target.result;
            };
            reader.readAsDataURL(processedFile);

            if (processedFile.size < origSize) {
                sizeEl.innerText = `Optimized: ${formatBytes(processedFile.size)} (reduced from ${formatBytes(origSize)})`;
            } else {
                sizeEl.innerText = `Size: ${formatBytes(processedFile.size)}`;
            }
        }
    }
}

function clearUpload(type) {
    const input = document.getElementById(type + 'imgInput');
    const emptyState = document.getElementById(type + 'EmptyState');
    const previewState = document.getElementById(type + 'PreviewState');
    const thumb = document.getElementById(type + 'Thumb');

    if (input) input.value = '';
    if (thumb) thumb.src = '';
    if (emptyState) emptyState.classList.remove('d-none');
    if (previewState) previewState.classList.add('d-none');
}
</script>
@endsection
