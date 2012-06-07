
    /**
     * Displays bulk action.
     *
{% if 'annotation' == format %}
     * @Route("/bulk", name="{{ route_name_prefix }}_bulk")
     * @Template()
{% endif %}
     */
    public function bulkAction()
    {
        $request = $this->getRequest();

        $bulk_ids = $request->get('bulk_ids');

        if (empty($bulk_ids)) {
            return $this->redirect($this->generateUrl('{{ route_name_prefix }}'));
        }

        $em = $this->getDoctrine()->getEntityManager();
        $entities = $em->getRepository('{{ bundle }}:{{ entity }}')->findById( $request->get('bulk_ids') );

        if ($request->get('action') == 'confirm') {
            $i = 0;
            foreach ($entities as $entity) {
                $em->remove($entity);
                $i++;
            }
            $em->flush();
            $this->get('session')->setFlash( 'success', $i.' {{ entity_class }} have been deleted' );
            return $this->redirect($this->generateUrl('{{ route_name_prefix }}'));
        }


{% if 'annotation' == format %}
        return array('entities' => $entities);
{% else %}
        return $this->render('{{ bundle }}:{{ entity|replace({'\\': '/'}) }}:bulk.html.twig', array(
            'entities' => $entities
        ));
{% endif %}
    }
