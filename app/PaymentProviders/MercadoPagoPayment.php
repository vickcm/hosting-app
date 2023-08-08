<?php
namespace App\PaymentProviders;

use App\Models\Product;
use App\PaymentProviders\Exceptions\UndefinedAccessTokenException;
use App\PaymentProviders\Exceptions\UndefinedPublicKeyException;
use Illuminate\Database\Eloquent\Collection;
use MercadoPago\Item;
use MercadoPago\Preference;

class MercadoPagoPayment
{
    protected Preference $preference;

    protected array $items = [];

    protected array $backUrls = [];

    protected bool $autoReturn = false;

    protected string $publicKey;

    /**
     * @throws UndefinedAccessTokenException
     * @throws UndefinedPublicKeyException
     */
    public function __construct()
    {
        if(empty(config('mercadopago.accessToken'))) {
            throw new UndefinedAccessTokenException();
        }
        if(empty(config('mercadopago.publicKey'))) {
            throw new UndefinedPublicKeyException();
        }

        \MercadoPago\SDK::setAccessToken(config('mercadopago.accessToken'));
        $this->publicKey = config('mercadopago.publicKey');
        $this->preference = new Preference();
    }

    /**
     * @param Product[]|Collection $products
     * @return self
     */
    public function addItems(array|Collection $products): self
    {
        foreach($products as $product) {
            $this->addItem($product);
        }

        return $this;
    }

    public function addItem(Product $product): self
    {
        $item = new Item();
        $item->title = $product->title;
        $item->unit_price = $product->price;
        $item->quantity = 1;
        $this->items[] = $item;

        return $this;
    }

    public function withBackUrls(?string $success = null, ?string $pending = null, ?string $failure = null): self
    {
        if($success !== null) $this->backUrls['success'] = $success;
        if($pending !== null) $this->backUrls['pending'] = $pending;
        if($failure !== null) $this->backUrls['failure'] = $failure;

        return $this;
    }

    public function withAutoReturn(): self
    {
        $this->autoReturn = true;

        return $this;
    }

    public function save(): self
    {
        $this->preference->items = $this->items;
        $this->preference->back_urls = $this->backUrls;
        if($this->autoReturn) $this->preference->auto_return = 'approved';

        $this->preference->save();

        return $this;
    }

    public function getPublicKey(): string
    {
        return $this->publicKey;
    }

    public function getPreferenceId(): string
    {
        return $this->preference->id;
    }
}