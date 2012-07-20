
    /**
     * Lists all {{ entity }} entities.
     *

{%- if 'annotation' == format %}

     * @Route("/", name="{{ route_name_prefix }}")
     * @Template()

{%- endif %}

     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $page = $this->get('request')->query->get('page', 1);
        $sort = $this->get('request')->query->get('sort', 'e.id');
        $direction = $this->get('request')->query->get('direction', 'ASC');

        $query = $em->getRepository('{{ bundle }}:{{ entity }}')->getListEntity($sort, $direction);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $page, /*page number*/
            25 /*limit per page*/
        );

        return compact('pagination');
    }
