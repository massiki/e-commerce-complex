# AGENTS.md

## Stack

- **Backend:** Laravel 13, PHP ^8.3
- **Frontend:** Blade + Tailwind CSS 3 + Alpine.js, Vite 6+ via `laravel-vite-plugin`
- **Auth:** Laravel Breeze (Blade stack)
- **Testing:** Pest ^4.7 with `pestphp/pest-plugin-laravel` (NOT PHPUnit directly)
- **DB:** SQLite by default (both dev and test); `.env.example` uses `DB_CONNECTION=sqlite`

## Key Commands

| Action | Command | Notes |
|---|---|---|
| Full setup | `composer run setup` | copies `.env`, generates key, migrates, installs npm, builds |
| Dev servers | `composer run dev` | runs `php artisan serve`, `queue:listen`, `pail`, `npm run dev` concurrently |
| Tests | `composer run test` | runs `config:clear` then `artisan test` (Pest). Also: `php artisan test` or `php vendor/bin/pest` |
| Vite build | `npm run build` | |
| Vite dev | `npm run dev` | |
| Lint | `./vendor/bin/pint` | Laravel Pint |

## Repo Structure

- `app/` — Laravel app code (Controllers, Models, Providers, View/Components)
- `resources/views/{admin,customer}/` — Blade views split by role
- `template/{Admin,Website}/` — HTML design mockups (NOT served by the app; reference for UI)
- `planning/` — Product spec documents (BRIEF.md, ERD.md, USE_CASE_DIAGRAM.md, etc.)
- `routes/web.php` — main routes; `routes/auth.php` — Breeze auth routes; `routes/console.php` — scheduler

## Architecture Notes

- **Admin vs Customer roles** are planned (see `planning/BRIEF.md` and `planning/ERD.md`) but NOT yet implemented — users table only has `name, email, password`. Role-based authorization needs to be built.
- **View split:** `admin/` for dashboard + CRUD mgmt, `customer/` for product browsing/cart/checkout. Layouts in `resources/views/layouts/`.
- **Payment gateway:** Midtrans planned (`config/services.php` has no Midtrans key yet).
- **Queue:** Default driver is `database`; the `composer run dev` command starts `queue:listen`.
- **Scheduler:** Laravel Task Scheduler planned for discount scheduling & automated tasks.

## Testing Conventions

- Tests live in `tests/Feature/` and `tests/Unit/`
- Feature tests auto-use `RefreshDatabase` via `tests/Pest.php`
- Test DB is SQLite `:memory:` (configured in `phpunit.xml`)
- Write Pest-style tests, e.g.:
  ```php
  test('guests cannot access admin', function () {
      $response = $this->get('/admin/dashboard');
      $response->assertRedirect('/login');
  });
  ```

## Gotchas

- `.npmrc` has `ignore-scripts=true` — npm postinstall scripts will NOT run
- Models use PHP 8 attributes (`#[Fillable]`, `#[Hidden]`) instead of traditional `$fillable`/`$hidden` properties
- Default `.env` has `DB_CONNECTION=sqlite` — you must `touch database/database.sqlite` before `php artisan migrate` if starting fresh
- `@php` at repo root is an empty file (not a directory), likely a symlink placeholder
