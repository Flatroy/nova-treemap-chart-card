# Nova Threemap Chart Card


This package allows you to add three-map fields to your resource details page and dashboards in [Nova](https://nova.laravel.com).

It basically takes a field with a decimal value between 0 and 1 and shows it as a percentage progress bar.

To edit a field, we recommend using the standard Number (\Laravel\Nova\Fields\Number) field.

<img src="https://github.com/flatroy/nova-treemap-chart-card/blob/main/img/img.png" alt="example">

#### DISCLAIMER:

This package is still work in progress. Feel free to help improve it.

-   [Requirements](#requirements)
-   [Installation](#installation)
-   [Basic Usage](#basic-usage)
-   [Advanced Options](#advanced-options)

---

## Requirements

-   [Laravel v9.0.\*](https://laravel.com/docs/9.0)
-   [Laravel Nova v4.\*](https://nova.laravel.com/docs/4.0/)

---

## Installation

Just run:

```bash
composer require flatroy/nova-treemap-chart-card
```

After this the setup will be complete, you can use the components listed here.

---

## Basic Usage

```php
// in App\Nova\User
...
use Flatroy\FieldProgressbar\FieldProgressbar;
use Laravel\Nova\Fields\Number;
...

/**
 * Get the fields displayed by the resource.
 *
 * @param \Laravel\Nova\Http\Requests\NovaRequest $request
 * @return array
 */
public function fields(NovaRequest $request)
{
    $data = [
        ['x' => 'Design', 'y' => 0.051],
        ['x' => 'Accounting', 'y' => 0.050],
        ['x' => 'Data Science', 'y' => 0.048],
        ['x' => 'Marketing', 'y' => 0.046],
        ['x' => 'Quality Assurance', 'y' => 0.046],
        ['x' => 'R&D', 'y' => 0.046],
    ];
    
    return [
        ...
        (new NovaTreemapChartCard())
            ->title('Some custom title')
            ->series($data)
            ->onlyOnDetail(),
        // or you can use like that:
        (new NovaTreemapChartCard())
            ->title('Some other custom title')
            ->series($this->model()?->find($request->resourceId)?->chartData)
            ->onlyOnDetail(),
        // or you can suggest how to do it better?
        ...
    ];
}


// if you want to put logic inside model - add this inside model:

namespace App\Models;
...
class User extends Model
{
...
    protected function getChartDataAttribute()
    {
        return [
            ['x' => 'Design', 'y' => 0.051],
            ['x' => 'Accounting', 'y' => 0.050],
            ['x' => 'Data Science', 'y' => 0.048],
            ['x' => 'Marketing', 'y' => 0.046],
            ['x' => 'Quality Assurance', 'y' => 0.046],
            ['x' => 'R&D', 'y' => 0.046],
        ];
    }
...
}
```

Feel free to come with suggestions for improvements.
