@extends('base')
@section('content')

<main>
  <div class="mt-4">
    <div class="container">
      <!-- row -->
      <div class="row">
        <!-- col -->
        <div class="col-12">
          <!-- breadcrumb -->

        </div>
      </div>
    </div>
  </div>
  <!-- section -->
  <section class="mb-lg-14 mb-8 mt-8">
    <div class="container">
      <!-- row -->
      <div class="row">
        @include('store.partials.sidebar')
        <div class="col-12 col-lg-9 col-md-8">


          <div class="row mt-8">
            <!-- row -->
          @include('store.partials.reviews-section', ['wrapInTab' => false])
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@section('script')
<script>
    document.querySelectorAll('.star-label').forEach((label, index) => {
        label.addEventListener('mouseover', () => highlightStars(index));
        label.addEventListener('mouseout', resetStars);
        label.addEventListener('click', () => selectStar(index));
    });

    function highlightStars(index) {
        document.querySelectorAll('.star-label i').forEach((star, i) => {
            star.className = i <= index ? 'bi bi-star-fill text-warning' : 'bi bi-star text-warning';
        });
    }

    function resetStars() {
        const selected = document.querySelector('input[name="rating"]:checked');
        const selectedIndex = selected ? parseInt(selected.value) - 1 : -1;
        document.querySelectorAll('.star-label i').forEach((star, i) => {
            star.className = i <= selectedIndex ? 'bi bi-star-fill text-warning' : 'bi bi-star text-warning';
        });
    }

    function selectStar(index) {
        document.getElementById(`star${index + 1}`).checked = true;
        resetStars();
    }
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {

        // Si l'URL contient #reviews-tab-pane, activer l'onglet Reviews
        if (window.location.hash === '#reviews-tab-pane') {

            // Activer l'onglet Bootstrap
            const reviewsTab = document.getElementById('reviews-tab');
            if (reviewsTab) {
                const tab = new bootstrap.Tab(reviewsTab);
                tab.show();
            }

            // Scroll smooth vers l'onglet
            setTimeout(() => {
                const tabSection = document.getElementById('reviews-tab-pane');
                if (tabSection) {
                    tabSection.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }, 300);
        }

        // Conserver le hash dans l'URL quand on clique sur l'onglet Reviews
        const reviewsTabBtn = document.getElementById('reviews-tab');
        if (reviewsTabBtn) {
            reviewsTabBtn.addEventListener('shown.bs.tab', function() {
                history.replaceState(null, null, '#reviews-tab-pane');
            });
        }

        // Retirer le hash quand on quitte l'onglet Reviews
        document.querySelectorAll('[data-bs-toggle="tab"]').forEach(function(tabEl) {
            tabEl.addEventListener('shown.bs.tab', function(e) {
                if (e.target.id !== 'reviews-tab') {
                    history.replaceState(null, null, ' ');
                }
            });
        });

    });
</script>

<script>
    function filterReviews(value) {
        const url = new URL(window.location.href);
        url.searchParams.set('sort', value);
        url.searchParams.delete('page'); // reset pagination au changement de tri
        url.hash = 'reviews-tab-pane';
        window.location.href = url.toString();
    }
</script>

@endsection

@endsection