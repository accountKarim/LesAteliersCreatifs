<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class PaymentController extends AbstractController {


    public function __construct()
    {
        # Clé secret stripe
        \Stripe\Stripe::setApiKey('sk_test_Ye9holoW7uSrqyEUFJLYiZf8');
    }

    /**
     * @Route("/payment", name="page_payment")
     * @param Request $request
     * @param UserInterface $user
     * @return mixed
     */
    public function paymentAction(Request $request, UserInterface $user) {

        $form = $this->get('form.factory')
            ->createNamedBuilder('payment-form')

            ->add('token', HiddenType::class, [
                'constraints' => [new NotBlank()],
            ])

            ->add('submit', SubmitType::class)

            ->getForm();

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {

                try {
                    $charge = \Stripe\Charge::create([
                        'amount' => 1 * 100,
                        'currency' => 'EUR',
                        'description' => 'Description',
                        'source' => $form->get('token')->getData(),
                        'receipt_email' => $user->getEmail(),
                    ]);
                    dump($charge);
                } catch (\Stripe\Error\Base $e) {
                    dump($e);
                }

            }
        }

        return $this->render('payment/payment.html.twig', [
            'form' => $form->createView(),
            'stripe_public_key' => $this->getParameter('stripe_public_key'),
        ]);

    }


}