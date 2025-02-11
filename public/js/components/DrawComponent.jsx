import React from 'react';

const DrawComponent = ({ locations, year, rangeYears }) => {
    const handleSubmit = async (e) => {
        e.preventDefault(); 
    
        // Obtén el token CSRF del meta tag
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
        // Realiza la solicitud POST usando fetch
        try {
            const response = await fetch(`/draw/${year}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken, 
                },
                body: JSON.stringify({}),
            });
    
            if (response.ok) {
                // alert('Sorteo realizado correctamente');
                window.location.reload(); // Recarga la página para ver los cambios
            } else {
                alert('Error al realizar el sorteo');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Hubo un error al realizar el sorteo');
        }
    };

    const handleYearChange = (e) => {
        const selectedYear = e.target.value;
        window.location.href = `/admin/draws?year=${selectedYear}`;
    };

    return (
        <div className="container">
            <h1 className="text-center mb-4">Sorteo para el año {year}</h1>

            {/* Sección de ubicaciones */}
            <div className="card mb-4">
                <div className="card-header bg-primary text-white">
                    <h2 className="mb-0">Ubicaciones</h2>
                </div>
                <div className="card-body">
                    {locations.length === 0 ? (
                        <p className="text-center">No hay ubicaciones disponibles para este año.</p>
                    ) : (
                        <div className="grid-container">
                            {locations.map((location, index) => (
                                <div className="grid-item card" key={index}>
                                    <div className="card-body">
                                        <h5 className="card-title">Coordenadas: ({location.x}, {location.y})</h5>
                                        <p className="card-text">
                                            <strong>Peña:</strong> {location.crew.name}<br />
                                            <strong>Año:</strong> {location.year}
                                        </p>
                                    </div>
                                </div>
                            ))}
                        </div>
                    )}
                </div>
            </div>

            {/* Sección de selección de año y sorteo */}
            <div className="card">
                <div className="card-header bg-success text-white">
                    <h2 className="mb-0">Seleccionar año y realizar sorteo</h2>
                </div>
                <div className="card-body">
                    <form onSubmit={handleSubmit}> {/* Usa onSubmit para manejar el envío del formulario */}
                        <div className="form-group">
                            <label htmlFor="year"><strong>Selecciona un año:</strong></label>
                            <select
                                name="year"
                                id="year"
                                className="form-control"
                                value={year} // Controla el valor seleccionado
                                onChange={handleYearChange} // Maneja el cambio de año
                            >
                                {rangeYears.map((rangeYear) => (
                                    <option key={rangeYear} value={rangeYear}>
                                        {rangeYear}
                                    </option>
                                ))}
                            </select>
                        </div>
                        <button type="submit" className="btn btn-warning btn-block mt-3">
                            <i className="fas fa-random"></i> Realizar sorteo
                        </button>
                    </form>
                </div>
            </div>
        </div>
    );
};

export default DrawComponent;