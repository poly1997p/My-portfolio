@extends('backend.master')

<style>
    /* ================= BUTTONS ================= */
    .btn-custom {
        border-radius: 6px;
        font-weight: 600;
        transition: 0.3s ease;
        padding: 8px 20px;
    }

    /* Add Skill Button (Blue) */
    #addSkillBtn {
        background-color: #007bff !important;
        color: #fff !important;
        border: none;
    }

    #addSkillBtn:hover {
        background-color: #0056b3 !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 86, 179, 0.3);
    }

    /* Update Skills Button (Green) */
    #updateSkillBtn {
        background-color: #28a745 !important;
        color: #fff !important;
        border: none;
    }

    #updateSkillBtn:hover {
        background-color: #218838 !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(33, 136, 56, 0.3);
    }

    /* Update About Button (Blue) */
    #updateAboutBtn {
        background-color: #007bff !important;
        color: #fff !important;
        border: none;
    }

    #updateAboutBtn:hover {
        background-color: #0056b3 !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 86, 179, 0.3);
    }

    /* ================= INPUTS ================= */
    #about-section .highlighted,
    #skillContainer .highlighted {
        background-color: #fff !important;
        color: #000 !important;
        border: 2px solid #007bff !important;
        border-radius: 6px !important;
        transition: all 0.3s ease;
        padding: 10px !important;
        box-shadow: 0 0 4px rgba(0, 123, 255, 0.2);
    }

    #about-section .highlighted:focus,
    #skillContainer .highlighted:focus {
        border-color: #0056b3 !important;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.5) !important;
        outline: none;
    }

    /* ================= SUMMERNOTE ================= */
    .note-editor.note-frame {
        background-color: #fff !important;
        border: 2px solid #007bff !important;
        box-shadow: 0 0 6px rgba(0, 123, 255, 0.3) !important;
        border-radius: 6px !important;
    }

    .note-editable {
        background-color: #fff !important;
        color: #000 !important;
    }
</style>

@section('content')

    <!-- ================= ABOUT SECTION ================= -->
    <div class="container mt-4" id="about-section">
        <h3 class="mb-3 text-primary border-bottom pb-2">About Section Management</h3>

        <form action="{{ url('/about/update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">

                <!-- About Title -->
                <div class="col-md-12">
                    <label class="fw-bold">About Title</label>
                    <input type="text" name="title" class="form-control highlighted" value="{{ $about->title ?? '' }}"
                        placeholder="Enter About Title">
                </div>

                <!-- Bio Description -->
                <div class="col-12 mt-3">
                    <label class="fw-bold">Bio Description</label>
                    <textarea name="description_bio" id="summernote1" class="form-control highlighted"
                        placeholder="Write Bio Description...">{{ $about->description_bio ?? '' }}</textarea>
                </div>

                <!-- Profile Picture -->
                <div class="col-md-6 mt-3">
                    <label class="fw-bold">Profile Picture</label>
                    <input type="file" name="profile_picture" class="form-control highlighted mt-2"
                        onchange="previewProfile(event)">
                    <div class="mt-2">
                        <img id="previewImage"
                            src="{{ asset('backend/images/about/' . ($about->profile_picture ?? 'default.png')) }}"
                            class="img-thumbnail mt-2" width="150" height="150" alt="Profile">
                    </div>
                </div>

                <!-- CV Upload -->
                <div class="col-md-6 mt-3">
                    <label class="fw-bold">Upload CV</label>
                    <input type="file" name="cv_file" class="form-control highlighted mt-2">
                    <small class="text-muted d-block mt-3">
                        Current CV:
                        @if (!empty($about->cv_link))
                            <a href="{{ asset('backend/files/cv/' . $about->cv_link) }}" target="_blank"
                                class="text-info">{{ $about->cv_link }}</a>
                        @else
                            Not uploaded yet
                        @endif
                    </small>
                </div>

                <!-- Update About Button aligned fully to right -->
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" id="updateAboutBtn" class="btn btn-custom">💾 Update About</button>
                </div>

            </div>
        </form>
    </div>

    <!-- ================= SKILL MANAGEMENT ================= -->
    <div class="container mt-5">
        <h4 class="text-primary border-bottom pb-2">Manage Skills</h4>

        <form action="{{ url('/skill/store') }}" method="POST" id="skillForm" class="mb-4">
            @csrf

            <div id="skillContainer" class="row g-3 mb-3">
                @if (isset($skills) && count($skills) > 0)
                    @foreach ($skills as $key => $skill)
                        {{-- Hidden ID for existing skills --}}
                        <input type="hidden" name="skills[{{ $key }}][id]" value="{{ $skill->id }}">

                        <div class="col-md-6 skill-item">
                            <label class="form-label fw-bold">Skill Name</label>
                            <input type="text" name="skills[{{ $key }}][name]" value="{{ $skill->name }}"
                                class="form-control highlighted" placeholder="Enter skill name">
                        </div>

                        <div class="col-md-6 skill-item">
                            <label class="form-label fw-bold">Progress %</label>
                            <input type="number" name="skills[{{ $key }}][progress]"
                                value="{{ $skill->progress }}" class="form-control highlighted"
                                placeholder="Enter progress %">
                        </div>

                        <div class="col-md-12 skill-item">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="skills[{{ $key }}][description]" class="form-control highlighted"
                                placeholder="Enter skill description...">{{ $skill->description ?? '' }}</textarea>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-6 skill-item">
                        <label class="form-label fw-bold">Skill Name</label>
                        <input type="text" name="skills[0][name]" class="form-control highlighted"
                            placeholder="Enter skill name">
                    </div>
                    <div class="col-md-6 skill-item">
                        <label class="form-label fw-bold">Progress %</label>
                        <input type="number" name="skills[0][progress]" class="form-control highlighted"
                            placeholder="Enter progress %">
                    </div>
                    <div class="col-md-12 skill-item">
                        <label class="form-label fw-bold">Description</label>
                        <textarea name="skills[0][description]" class="form-control highlighted" id="summernote2"
                            placeholder="Enter skill description..."></textarea>
                    </div>
                @endif
            </div>

            <div class="d-flex flex-column align-items-end mb-3">
                <button type="button" id="addSkillBtn" class="btn btn-primary mb-2">➕ Add Skill</button>
                <button type="submit" id="updateSkillBtn" class="btn btn-success">💾 Update Skills</button>
            </div>
        </form>



        <!-- Existing Skills Table -->
        <hr>
        <h5 class="mt-4 text-primary">Existing Skills</h5>
        <table class="table table-bordered table-dark table-striped mt-3">
            <thead>
                <tr>
                    <th>Skill Name</th>
                    <th>Progress (%)</th>
                    <th>Description</th>
                    <th width="100">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($skills as $skill)
                    <tr>
                        <td>{{ $skill->name }}</td>
                        <td>{{ $skill->progress }}%</td>
                        <td>{{ $skill->description ?? '—' }}</td>
                        <td class="text-center">
                            <a href="{{ url('/skill/delete/' . $skill->id) }}" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this skill?')">
                                Delete
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">No skills added yet</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let skillCount = {{ isset($skills) ? count($skills) : 1 }};

            function initSummernoteForNewSkill(id) {
                $('#' + id).summernote({
                    height: 100,
                    placeholder: 'Enter skill description...'
                });
            }

            document.getElementById('addSkillBtn').addEventListener('click', function() {
                const container = document.getElementById('skillContainer');
                const textareaId = 'skillDesc' + skillCount; // Unique ID
                const newSkill = `
            <div class="col-md-6 skill-item mt-2">
                <label class="form-label fw-bold">Skill Name</label>
                <input type="text" name="skills[${skillCount}][name]" placeholder="Enter skill name" class="form-control highlighted">
            </div>
            <div class="col-md-6 skill-item mt-2">
                <label class="form-label fw-bold">Progress %</label>
                <input type="number" name="skills[${skillCount}][progress]" placeholder="Enter progress %" class="form-control highlighted">
            </div>
            <div class="col-md-12 skill-item mt-2">
                <label class="form-label fw-bold">Description</label>
                <textarea id="${textareaId}" name="skills[${skillCount}][description]" placeholder="Enter skill description..." class="form-control highlighted"></textarea>
            </div>`;
                container.insertAdjacentHTML('beforeend', newSkill);

                // Initialize Summernote for the new textarea
                initSummernoteForNewSkill(textareaId);

                skillCount++;
            });

            // Initialize Summernote for existing skill textareas
            $('[id^=summernote]').summernote({
                height: 100
            });
        });
    </script>

    <!-- include libraries(jQuery, bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote1').summernote();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#summernote2').summernote();
        });
    </script>
@endpush
