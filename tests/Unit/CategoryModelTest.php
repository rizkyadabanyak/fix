<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\KategoriItem as Category;
class CategoryModelTest extends TestCase
{
    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    use DatabaseTransactions;

    public function category_insert()
    {
        $category = Category::create(['nama' => 'micin']);
        $this->assertEquals('micin', $category->nama);
    }
}
