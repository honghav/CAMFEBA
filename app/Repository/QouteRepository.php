<?php 
    namespace App\Repository;

    use App\Repository\Interface\QouteRepositoryInterface;
    use App\Models\Qoute;

    class QouteRepository implements QouteRepositoryInterface
    {
        public function getAllQoutes()
        {
            return Qoute::all();
        }

        public function getQouteById($id)
        {
            return Qoute::findOrFail($id);
        }

        public function createQoute(array $data)
        {
            return Qoute::create($data);
        }

        public function updateQoute($id, array $data)
        {
            $qoute = $this->getQouteById($id);
            $qoute->update($data);
            return $qoute;
        }

        public function deleteQoute($id)
        {
            $qoute = $this->getQouteById($id);
            return $qoute->delete();
        }

        public function searchQoutes($query)
        {
            return Qoute::where('name', 'like', "%{$query}%")->get();
        }
    }