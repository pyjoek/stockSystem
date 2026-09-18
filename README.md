# Stock System

Inventory for multiple branches (the old Vita 1–15 idea), rebuilt as one stock core instead of 15 copied apps.

## Architecture

- **branches** — HQ + shop locations (Vita 1–15 are data rows, not separate codebases)
- **products** — one catalog (SKU, prices, reorder level)
- **stock_levels** — quantity on hand per product per branch
- **stock_movements** — receive, sell, transfer, adjust

Roles:

- `admin` — sees every branch, manages products and branches
- `user` — tied to one `branch_id`, can only move stock there

Old `vita1`…`vita15` controllers and tables remain in the repo but the live app no longer uses them.

## Setup

```bash
composer install
php artisan migrate
php artisan db:seed
php artisan serve
```

Seeded login:

- email: `admin@stock.local`
- password: `password`

Then open `/dashboard`.
