/**
 * Finds and displays a {{ entity }} entity.
 *
 * @Route("/{id}/show", name="{{ route_name_prefix }}_show")
 * @Template()
 */
public function showAction($id)
{
    $em = $this->getDoctrine()->getEntityManager();

    $entity = $em->getRepository('{{ bundle }}:{{ entity }}')->find($id);

    if (!$entity) {
        throw $this->createNotFoundException('Unable to find {{ entity }} entity.');
    }

    return array(
        'entity' => $entity,
    );
}
